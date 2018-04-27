<?php

namespace App\Providers;

use App\Transformers\DarkskyInterface;
use App\Transformers\Darksky;
use Illuminate\Support\ServiceProvider;

class DarkskyTransformerServiceProvider extends ServiceProvider
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
     * Register any transformer services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(DarkskyInterface::class, Darksky::class);
    }
}
