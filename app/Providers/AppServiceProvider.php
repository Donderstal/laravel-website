<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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

        Blade::component('admin.components.fields.input', 'input');
        Blade::component('admin.components.button', 'button');
        Blade::component('admin.components.panel', 'panel');

    }
}
