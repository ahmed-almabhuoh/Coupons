<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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

        // Share the value with all views
        View::composer('*', function ($view) use ($website_settings) {
            $view->with('new_website_settings', $website_settings);
        });
    }
}
