<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('ImageUtil', function () {
            return new \App\Utilities\ImageUtil;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // force using https for all requests
        if (env('APP_ENV') == 'production' && env('ENABLE_HTTPS') == true) {
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
        Blade::component('admin.components.fields.input', 'input');
        Blade::component('admin.components.button', 'button');
        Blade::component('admin.components.panel', 'panel');

    }
}
