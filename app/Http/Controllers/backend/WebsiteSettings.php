<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteSettings extends Controller
{
    //
    // Logo setup view
    public function getLogoSetup()
    {
        return response()->view('backend.settings.logo-setup');
    }
}
