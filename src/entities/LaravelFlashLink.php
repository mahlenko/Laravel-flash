<?php

namespace Makhlenko\LaravelFlash\entities;

class LaravelFlashLink
{
    public function __construct(
        public string $text,
        public string $href
    ) {}
}