<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function getAboutPage()
    {
        return response()->view('frontend.client.about');
    }
}
