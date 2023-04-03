<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AuthenticationController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('cpanel')->middleware('guest:admin')->group(function () {
    Route::get('login', [AuthenticationController::class, 'getLoginView'])->name('login');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');
});

Route::prefix('cpanel')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'getPanel'])->name('control.panel');

    Route::resource('admins', AdminController::class);

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});
