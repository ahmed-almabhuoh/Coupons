<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    // Get Control Panel
    public function getPanel()
    {
        return response()->view('temp.app');
    }
}
