<?php

use App\Http\Controllers\AccountManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AqsController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\backend\AuthenticationController;
use App\Http\Controllers\backend\ContactUsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\WebsiteSettings;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\front\AuthenticationController as FrontAuthenticationController;
use App\Http\Controllers\front\ClientController;
use App\Http\Controllers\front\PagesController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SerialController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Backend\Roles\Create;
use App\Http\Livewire\Backend\Roles\RoleSearch;
use App\Http\Livewire\Front\Client\Home;
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
    Route::resource('countries', CountryController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('products', ProductController::class);
    Route::resource('aqs', AqsController::class);
    Route::resource('offers', OfferController::class);
    Route::resource('serials', SerialController::class);
    // Route::resource('blogs', BlogController::class);
    // Route::resource('articals', ArticalController::class);

    // Roles Authorization Routes
    Route::get('roles', [AuthenticationController::class, 'getRoles'])->name('roles.management');
    Route::get('roles/create',  [AuthenticationController::class, 'createRole'])->name('roles.create');
    Route::get('roles/edit/{role_id}', [AuthenticationController::class, 'editRole'])->name('roles.edit');
    Route::delete('roles/destroy/{role_id}', [AuthenticationController::class, 'destroyRole'])->name('roles.delete');
    Route::get('roles/assign-permission/{role_id}', [AuthenticationController::class, 'assignPermissions'])->name('roles.assign.permissions');
    Route::get('roles/assign-permission/{role_id}/{permission_id}', [AuthenticationController::class, 'assignPermissionToRole']);
});

Route::prefix('cpanel')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'getPanel'])->name('control.panel');
    Route::get('contacts', [ContactUsController::class, 'getContacts'])->name('contacts.index');
    Route::delete('contacts/{contact_id}', [ContactUsController::class, 'deleteContact'])->name('contacts.destroy');
    Route::get('/add-contact-to-questions/{contact_id}', [ContactUsController::class, 'addContactToQuestions'])->name('contacts.to.questions');
    Route::get('/logo-setup', [WebsiteSettings::class, 'getLogoSetup'])->name('logo.setup');
    Route::post('/logo-setup', [WebsiteSettings::class, 'logoSetup']);

    Route::get('update-account', [AccountManagementController::class, 'getAccountManagementView'])->name('manage.admins.accounts');
    Route::get('change-password', [AccountManagementController::class, 'changePassword'])->name('manage.admins.password');
    Route::get('/change-locale/{locale}', [AccountManagementController::class, 'changeLocale'])->name('admins.change.locale');
});

Route::prefix('cpanel')->middleware(['auth:client,admin'])->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::prefix('cpanel')->group(function () {
    Route::get('forgot-password', [AccountManagementController::class, 'getForgotPasswordView'])->name('manage.admins.forgot.password');
    // Route::get('reset-password', [AccountManagementController::class, 'resetPassword'])->name('manage.admins.reset.password');
});

Route::prefix('/')->group(function () {
    Route::get('about', [ClientController::class, 'getAboutPage'])->name('pages.about');
    // Route::get('blogs', [ClientController::class, 'getBlogsPage'])->middleware(['auth:client'])->name('pages.blogs');
    // Route::get('blogs', [ClientController::class, 'getBlogsPage'])->name('pages.blogs');
    Route::get('fqs', [ClientController::class, 'getFqsPage'])->name('pages.fqs');
    Route::get('/offers', [ClientController::class, 'getOfferPage'])->name('pages.offers');
    Route::get('/', [ClientController::class, 'getHomePage'])->name('pages.home');
    // Route::get('/', function () {
    //     dd('Here');
    // })->name('pages.home');
    // Route::get('/articals/{blog_id}', [ClientController::class, 'getArticalsPage'])->name('pages.articals');
    // Route::get('/', [ClientController::class, 'getHomePage'])->name('pages.home');
    Route::get('/get-product/{product_id}', [ClientController::class, 'getProduct'])->name('get.specific.product');
    Route::get('/get-coupon/{coupons_id}', [ClientController::class, 'getCoupon'])->name('get.specific.coupon');

    Route::post('contact', [ClientController::class, 'recieveContactRequest'])->middleware('throttle:3,60')->name('send.contact');
});


Route::prefix('/')->middleware(['guest:client'])->group(function () {
    // Admin forgot password
    Route::post('forget-password', [AuthenticationController::class, 'forgetPassword'])->name('forget.password');
    Route::get('reset-password/{token}', [AuthenticationController::class, 'resetPassword'])->name('users.reset.password');

    Route::get('forgot-password', [AuthenticationController::class, 'clientForgotPassword'])->name('clients.forgot.password');
    Route::post('forgot-password', [AuthenticationController::class, 'resetClientPassword'])->name('clients.reset.password');
    Route::get('reset-password-client/{token}', [AuthenticationController::class, 'resetClientPasswordForm'])->name('clients.reset.password.function');
    Route::post('reset-password-client-submitted/{token}', [AuthenticationController::class, 'submitClientNewPassword'])->name('clients.reset.password.submitted');
    Route::get('register', [FrontAuthenticationController::class, 'getRegisterView'])->name('users.register');
    Route::get('login', [FrontAuthenticationController::class, 'getLogin'])->name('users.login');
});

Route::prefix('/')->middleware(['auth:client'])->group(function () {

    // User Interactions Routes
    Route::get('/add-to-favorite/{id}/{position}', [Home::class, 'addToFavorite'])->name('add.to.favorite');
    Route::get('/check-user-coupon/{id}', [ClientController::class, 'checkUserCoupone'])->name('users.check.coupons');
    Route::get('/check-user-product/{id}', [ClientController::class, 'checkUserProduct'])->name('users.check.products');

    Route::prefix('/')->withoutMiddleware('auth:client')->group(function () {
        // Coupons Activation OR NOT
        Route::get('/set-as-activation/{coupon_id}', [ClientController::class, 'setCouponeAsActivated'])->name('coupons.activated');
        Route::get('/set-as-inactivation/{coupon_id}', [ClientController::class, 'setCouponeAsInActivated'])->name('coupons.inactivated');

        // Set the last use
        Route::get('/set-last-use/{id}/{position}', [Home::class, 'setLastUse'])->name('set.last.use');

        // Product Activation OR NOT
        Route::get('/set-product-as-activation/{product_id}', [ClientController::class, 'setProductAsActivated'])->name('products.activated');
        Route::get('/set-product-as-inactivation/{product_id}', [ClientController::class, 'setProductAsInActivated'])->name('products.inactivated');
    });

    Route::get('favorite', [PagesController::class, 'getFavorite'])->name('users.favorite');
    Route::get('change-password', [PagesController::class, 'getChangePassword'])->name('users.change.password');
    Route::get('account', [PagesController::class, 'getAccount'])->name('users.account');
});

Route::get('license', [SerialController::class, 'getLicensePage'])->name('license.page');
Route::post('license', [SerialController::class, 'submitLicense'])->name('license.submit');
Route::get('download-release/{token}', [SerialController::class, 'downloadRelease'])->name('download.release');
