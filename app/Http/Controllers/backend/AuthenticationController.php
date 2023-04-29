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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
                    $admin->password = Hash::make($password);
                    $isChanged = $admin->save();

                    if ($isChanged)
                        $reset = DB::table('users_reset_passwords')->where([
                            ['position', '=', $position],
                            ['u_id', '=', $id]
                        ])->delete();

                    if ($isChanged)
                        NewPasswordJob::dispatch($password, $admin);
                } else {
                    // Show reset password form for clients
                    return redirect()->route('clients.reset.password.function', $token);
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

    // Client Forgot Password
    public function clientForgotPassword()
    {
        return response()->view('frontend.auth.forgot');
    }

    // Reset Client Password
    public function resetClientPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Something went wrong, please try again later!',
        ]);
        //
        $user = User::where('email', $request->post('email'))->first();

        ResetPasswordJob::dispatch('user', $user);

        return redirect()->route('users.login')->with([
            'message' => 'We send you an email to reset your password, check your inbox please!',
            'status' => 200,
        ]);
    }


    // Reset Client Password Form
    public function resetClientPasswordForm($token)
    {
        $values = explode("@", Crypt::decrypt($token));
        // $email = $values[0] . '@' . $values[1];
        $id = $values[2];
        $uuid = $values[3];
        $position = $values[4];

        $reset = DB::table('users_reset_passwords')->where([
            ['position', '=', $position],
            ['u_id', '=', $id]
        ])->orderBy('created_at', 'DESC')->first();


        if (!is_null($reset)) {
            if (Crypt::decrypt($reset->token) == $uuid && !Carbon::now()->greaterThan($reset->expired_at)) {
                return response()->view('frontend.auth.reset', [
                    'token' => $token,
                ]);
            } else {
                return redirect()->route('users.login');
            }
        } else {
            return redirect()->route('users.login');
        }
    }

    // Submit the new password from the form to the client account
    public function submitClientNewPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|string|min:8|max:25|confirmed',
        ]);
        //
        $values = explode("@", Crypt::decrypt($token));
        $email = $values[0] . '@' . $values[1];
        $id = $values[2];
        $position = $values[3];

        $user = User::where([
            ['id', '=', $id],
            ['email', '=', $email]
        ])->first();

        if (!is_null($user)) {
            $user->password = Hash::make($request->post('password'));
            $isChanged = $user->save();

            if ($isChanged)
                DB::table('users_reset_passwords')->where([
                    ['position', '=', $position],
                    ['u_id', '=', $id]
                ])->delete();

            return redirect()->route('users.login')->with([
                'status' => $isChanged ? 200 : 400,
                'message' => $isChanged ? 'Password change successfully' : 'Failed to change your password, please try again later!',
            ]);
        } else {
            return redirect()->route('users.login');
        }
    }

    // Get roles view
    public function getRoles()
    {
        if (!auth()->user()->can('view-roles')) {
            abort(403);
        }
        return response()->view('backend.roles.index');
    }

    // Create a new role
    public function createRole()
    {
        if (!auth()->user()->can('create-role')) {
            abort(403);
        }
        return response()->view('backend.roles.store');
    }

    // Edit the role
    public function editRole($id)
    {
        if (!auth()->user()->can('edit-role')) {
            abort(403);
        }
        $role = Role::where('id', Crypt::decrypt($id))->first();
        return response()->view('backend.roles.edit', [
            'role' => $role,
        ]);
    }

    // Delete the role
    public function destroyRole($id)
    {
        if (!auth()->user()->can('delete-role')) {
            abort(403);
        }
        $role = Role::findOrFail(Crypt::decrypt($id));
        //
        if ($role->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Role deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Role deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the role!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the role!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Assign Permission to role view
    public function assignPermissions($id)
    {
        if (!auth()->user()->can('assign-permissions')) {
            abort(403);
        }
        $role = Role::where('id', Crypt::decrypt($id))->first();
        $permissions = Permission::paginate(10);

        return response()->view('backend.roles.assign-permissions', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    // Submit assign permission to role
    public function assignPermissionToRole($role_id, $permission_id)
    {
        $role = Role::findOrFail(Crypt::decrypt($role_id));
        $permission = Permission::findOrFail(Crypt::decrypt($permission_id));

        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);

            return response()->json([
                'header' => __('Success'),
                'body' => __('Permission revoked from the role successfully'),
            ]);
        } else {
            $role->givePermissionTo($permission);

            return response()->json([
                'header' => __('Success'),
                'body' => __('Permission assigned to the role successfully'),
            ]);
        }
    }
}
