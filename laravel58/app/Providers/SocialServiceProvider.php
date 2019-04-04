<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Twitter;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // a service container with the same name in web.php will override this one
        // but should be place here instead of in web.php
        $this->app->singleton(Twitter::class, function() {
            return new Twitter(config('services.twitter.secret'));
            // return new Twitter(config('laracasts.twitter.secret'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
