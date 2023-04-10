<?php

use App\Http\Controllers\AccountManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AqsController;
use App\Http\Controllers\backend\AuthenticationController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
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
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('products', ProductController::class);
    Route::resource('aqs', AqsController::class);
});

Route::prefix('cpanel')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'getPanel'])->name('control.panel');

    Route::get('update-account', [AccountManagementController::class, 'getAccountManagementView'])->name('manage.admins.accounts');
    Route::get('change-password', [AccountManagementController::class, 'changePassword'])->name('manage.admins.password');

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});
