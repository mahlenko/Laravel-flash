<?php

use Makhlenko\LaravelFlash\enums\LaravelFlashType;
use Makhlenko\LaravelFlash\LaravelFlash;

if (!function_exists('flash')) {
    function flash(string $namespace = 'default'): LaravelFlash {
        return LaravelFlash::namespace($namespace);
    }
}

if (!function_exists('flash_messages')) {
    function flash_messages(LaravelFlashType $type, string $namespace = null): object {
        return session()->get(
            laravel_flash_session_name($type, $namespace ?? 'default')
        );
    }
}


if (!function_exists('laravel_flash_session_name')) {
    function laravel_flash_session_name(LaravelFlashType $type, string $namespace) {
        return sprintf(config('flash.session-name') .'::%s::%s', $namespace, $type);
    }
}
