<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
        $user = auth('admin')->user();
        $user = Admin::where('id', $user->id)->first();
        $user->lang = $locale;
        $user->save();
        // app()->setLocale($locale);
        // dd( app()->getLocale());
        
        return redirect()->back();
    }
}
