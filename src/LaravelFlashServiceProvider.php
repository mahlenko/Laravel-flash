<?php

namespace Makhlenko\LaravelFlash;

use Illuminate\Support\Facades\Blade;

class LaravelFlashServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void {
        $this->mergeConfigFrom(__DIR__ . '/support/config.php', 'flash');
        $this->loadViewsFrom(__DIR__ .'/views', 'flash');

        $this->publishes([
            __DIR__ .'/support/config.php' => config_path('flash.php')
        ], 'flash');

        $this->publishes([
            __DIR__.'/views/' => resource_path('views/vendor/flash')
        ], 'flash-views');
    }
}
