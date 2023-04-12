<?php

use App\Http\Controllers\AccountManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AqsController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\backend\AuthenticationController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\front\AuthenticationController as FrontAuthenticationController;
use App\Http\Controllers\front\PagesController;
use App\Http\Controllers\OfferController;
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
    Route::resource('offers', OfferController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('articals', ArticalController::class);
});

Route::prefix('cpanel')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'getPanel'])->name('control.panel');

    Route::get('update-account', [AccountManagementController::class, 'getAccountManagementView'])->name('manage.admins.accounts');
    Route::get('change-password', [AccountManagementController::class, 'changePassword'])->name('manage.admins.password');

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::prefix('cpanel')->group(function () {
    Route::get('forgot-password', [AccountManagementController::class, 'getForgotPasswordView'])->name('manage.admins.forgot.password');
    // Route::get('reset-password', [AccountManagementController::class, 'resetPassword'])->name('manage.admins.reset.password');
});


Route::prefix('/')->group(function () {
    Route::get('register', [FrontAuthenticationController::class, 'getRegisterView'])->name('users.register');

    Route::get('login', [FrontAuthenticationController::class, 'getLogin'])->name('users.login');
});

Route::prefix('/')->middleware(['auth:web'])->group(function () {
    // Route::get('register', [FrontAuthenticationController::class, 'getRegisterView'])->name('users.register');
    Route::get('favorite', [PagesController::class, 'getFavorite'])->name('users.favorite');
});
