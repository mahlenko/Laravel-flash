<?php

use Makhlenko\LaravelFlash\LaravelFlash;

if (!function_exists('flash')) {
    function flash(string $namespace = null): LaravelFlash {
        return LaravelFlash::instance($namespace);
    }
}
