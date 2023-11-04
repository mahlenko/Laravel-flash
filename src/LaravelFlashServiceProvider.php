<?php

namespace Makhlenko\LaravelFlash;

class LaravelFlashServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void {
        $this->mergeConfigFrom(__DIR__ . '/support/config.php', 'flash');
        $this->loadViewsFrom(__DIR__ .'/resources/views', 'flash');
    }
}
