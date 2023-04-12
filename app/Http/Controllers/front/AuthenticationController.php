<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    //
    public function getRegisterView()
    {
        return response()->view('frontend.auth.register');
    }

    public function getLogin()
    {
        return response()->view('frontend.auth.login');
    }
}
