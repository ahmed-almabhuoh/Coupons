<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function getFavorite()
    {
        return response()->view('frontend.pages.favorite');
    }

    public function getChangePassword()
    {
        return response()->view('frontend.auth.change-password');
    }

    public function getAccount()
    {
        return response()->view('frontend.pages.account');
    }
}
