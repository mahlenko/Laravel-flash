<?php

namespace Makhlenko\LaravelFlash;

interface MessagesInterface
{
    public function push(string $message);

    public function getType(): string;
}
