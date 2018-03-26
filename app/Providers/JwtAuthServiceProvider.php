<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dingo\Api\Auth\Provider\Basic;
use Dingo\Api\Auth\Provider;

class JwtAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        app('Dingo\Api\Auth\Auth')->extend('basic', function ($app) {
//            return new Dingo\Api\Auth\Provider\Basic($app['auth'], 'email');
//        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
