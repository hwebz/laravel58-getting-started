<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Services\Twitter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('foo', function() {
            return 'bar';
        });

        // a service container with the same name in web.php will override this one
        // but should be place here instead of in web.php
        // $this->app->singleton(Twitter::class, function() {
        //     return new Twitter('api key from service provider');
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
