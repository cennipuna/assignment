<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Src\DarkSky;

class DarkskyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('darksky',function($app)
        {
            return new DarkSky();
        });
    }
}
