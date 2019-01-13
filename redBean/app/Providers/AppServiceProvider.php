<?php

namespace App\Providers;

use App\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $config = Config::first();
        if ($config) {
            config(['app.name'=>$config->name]);
            config(['app.url'=>$config->url]);
            config(['site'=>$config]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
