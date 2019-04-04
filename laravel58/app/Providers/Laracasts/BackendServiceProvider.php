<?php

namespace App\Providers\Laracasts;

use Illuminate\Support\ServiceProvider;
use App\Providers\Laracasts\Repositories\UserRepository;
use App\Providers\Laracasts\Repositories\DbUserRepository;

class BackendServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(
            UserRepository::class, // interface
            DbUserRepository::class // implemented class for above interface
        );
    }
}
