<?php

namespace Makhlenko\LaravelFlash;

class LaravelFlashServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void {
        $this->mergeConfigFrom(__DIR__ . '/support/config.php', 'flash');
        $this->loadViewsFrom(__DIR__ .'/resources/views', 'flash');

        $this->publishes([
            __DIR__ .'/support/config.php' => config_path('flash.php')
        ], 'flash-config');

        $this->publishes([
            __DIR__.'/resources/views/' => resource_path('views/vendor/flash')
        ], 'flash-views');
    }
}
