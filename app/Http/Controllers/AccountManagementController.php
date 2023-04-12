<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
