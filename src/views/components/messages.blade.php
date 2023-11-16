@props([
    'namespace' => null,
    'type' => \Makhlenko\LaravelFlash\enums\LaravelFlashType::DEFAULT,
    'view' => config('flash.views.messages')
])

@include($view)
