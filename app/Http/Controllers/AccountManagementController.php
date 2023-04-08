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
}
