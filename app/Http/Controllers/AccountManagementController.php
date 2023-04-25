<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AccountManagementController extends Controller
{
    //
    public function getAccountManagementView()
    {
        return response()->view('backend.account.update-my-account', [
            'user' => auth()->user(),
        ]);
    }

    // Change password
    public function changePassword()
    {
        return response()->view('backend.account.change-password', [
            'user' => auth()->user(),
        ]);
    }

    // Forgot password view
    public function getForgotPasswordView()
    {
        return response()->view('backend.auth.forgot-password');
    }

    // Change Locale
    public function changeLocale($locale)
    {
        if (auth()->check()) {
            if (auth('admin')->check()) {
                $user = auth('admin')->user();
                $user = Admin::where('id', $user->id)->first();
                $user->lang = $locale;
                $user->save();
            } else {
                $user = auth('client')->user();
                $user = User::where('id', $user->id)->first();
                $user->lang = $locale;
                $user->save();
            }
        } else {
            session(['lang' => $locale]);
        }


        return redirect()->back();
    }
}
