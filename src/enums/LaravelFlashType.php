<?php

namespace Makhlenko\LaravelFlash\enums;

use ValueError;

enum LaravelFlashType
{
    case SUCCESS;
    case ERROR;
    case WARNING;
    case INFO;
    case DEFAULT;
    case MODAL;
    case NOTIFY;

    public static function fromName(string $name): LaravelFlashType {
        $name = strtoupper($name);

        foreach (self::cases() as $case) {
            if ($name === $case->name ){
                return $case;
            }
        }

        throw new ValueError($name .' is not a valid backing value for enum '. self::class);
    }
}
