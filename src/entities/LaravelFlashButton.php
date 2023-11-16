<?php

namespace Makhlenko\LaravelFlash\entities;

class LaravelFlashButton
{
    public function __construct(
        public string $text,
        public string $action
    ) {}
}