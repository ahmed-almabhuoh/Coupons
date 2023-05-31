<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Coupon;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        // Fetch the value from the database
        $website_settings = DB::table('website_settings')->first();

        // dd(Cookie::get('new_selected_country'), 'Here');

        // Fetch Countries
        // $countries = DB::table('countries')->where('status', 'active')->get();

        // Share the value with all views
        View::composer('*', function ($view) use ($website_settings) {
            // $view->with('new_website_settings', $website_settings);
            $view->with([
                'new_website_settings' => $website_settings,
                // 'countries' => $countries,
            ]);
        });
    }
}
