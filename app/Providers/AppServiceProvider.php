<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        require_once app_path() . '/Helpers/__System/Default.php';
        require_once app_path() . '/Helpers/__System/Datatable.php';
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
