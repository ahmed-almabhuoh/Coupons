<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Jobs\NewPasswordJob;
use App\Jobs\ResetPasswordJob;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\NewPasswordMail;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    //
    public function getLoginView()
    {
        return response()->view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator($request->only([
            'username',
            'password',
            'remember_me',
        ]), [
            'username' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'required|boolean',
        ]);
        //
        if (!$validator->fails()) {
            $key = filter_var($request->post('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            $credentials = [
                $key => $request->post('username'),
                'password' => $request->post('password'),
            ];

            if (Auth::guard('admin')->attempt($credentials, $request->post('remember_me'))) {
                $user = Admin::where('' . $key, $request->post('username'))->first();
                $user->is_active = true;
                $user->save();

                return response()->json([
                    'header' => __('Success'),
                    'body' => __('Login successfully'),
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'header' => __('Failed!'),
                    'body' => __('Failed to login, please try again!'),
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'body' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check() && Auth::guard('client')->check()) {
            $user = User::findOrFail(auth()->user()->id);
            $user->is_active = false;
            $user->save();

            Auth::guard('client')->logout();
            $request->session()->invalidate();

            return redirect()->route('users.login');
        }
        if (Auth::guard('admin')->check()) {
            $user = Admin::findOrFail(auth()->user()->id);
            $user->is_active = false;
            $user->save();

            Auth::guard('admin')->logout();
            $request->session()->invalidate();

            return redirect()->route('login');
        } else {
            $user = User::findOrFail(auth()->user()->id);
            $user->is_active = false;
            $user->save();

            Auth::guard('client')->logout();
            $request->session()->invalidate();

            return redirect()->route('users.login');
        }
    }

    // Reset Password
    public function resetPassword($token)
    {
        $values = explode("@", Crypt::decrypt($token));
        $email = $values[0] . '@' . $values[1];
        $id = $values[2];
        $uuid = $values[3];
        $position = $values[4];

        $reset = DB::table('users_reset_passwords')->where([
            ['position', '=', $position],
            ['u_id', '=', $id]
        ])->orderBy('created_at', 'DESC')->first();


        if (!is_null($reset)) {
            if (Crypt::decrypt($reset->token) == $uuid && !Carbon::now()->greaterThan($reset->expired_at)) {

                // Get the user
                $password = Str::random(10);
                $isChanged = false;
                if ($position == 'admin') {
                    $admin = Admin::where('email', $email)->first();
                    // dd($admin);
                    // $admin->fname = $admin->fname;
                    // $admin->lname = $admin->lname;
                    // $admin->email = $admin->email;
                    // $admin->phone = $admin->phone;
                    // $admin->status = $admin->status;
                    // $admin->image = $admin->image;
                    $admin->password = Hash::make($password);
                    $isChanged = $admin->save();

                    if ($isChanged)
                        NewPasswordJob::dispatch($password, $admin);
                } else {
                    $user = User::where('email', $email)->first();
                    // $user->fname = $user->fname;
                    // $user->lname = $user->lname;
                    // $user->email = $user->email;
                    // $user->phone = $user->phone;
                    // $user->status = $user->status;
                    // $user->image = $user->image;
                    $user->password = Hash::make($password);
                    $isChanged = $user->save();

                    if ($isChanged)
                        NewPasswordJob::dispatch($password, $user);
                }

                return redirect()->route($position == 'admin' ? 'login' : 'users.login')->with([
                    'message' => $isChanged ? 'Check your inbox to get your new password' : 'Failed to reset your password, something went wrong please try again later!',
                    'status' => $isChanged ? 200 : 400,
                ]);
            } else {
                return redirect()->route('users.login');
            }
        } else {
            return redirect()->route('users.login');
        }
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
        ], [
            'email.exists' => 'Something wend wrong, please try again later!',
        ]);
        //
        $admin = Admin::where('email', $request->post('email'))->first();

        ResetPasswordJob::dispatch('admin', $admin);

        return redirect()->back()->with([
            'message' => 'We send you an email to reset your password, check your inbox please!',
        ]);
    }
}
