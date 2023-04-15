<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

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
        if (Auth::guard('admin')->check()) {
            $user = Admin::findOrFail(auth()->user()->id);
            $user->is_active = false;
            $user->save();

            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        } else {
            $user = User::findOrFail(auth()->user()->id);
            $user->is_active = false;
            $user->save();

            Auth::guard('client')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('users.login');
        }
    }
}
