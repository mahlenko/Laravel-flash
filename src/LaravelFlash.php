<?php

namespace Makhlenko\LaravelFlash;

use BadMethodCallException;
use Illuminate\Support\Collection;
use Makhlenko\LaravelFlash\entities\LaravelFlashGroup;

/**
 * Laravel flash messages
 *
 * @method void success(string|array $message, ?string $title) A simple success message
 * @method void error(string|array $message, ?string $title) A simple error message
 * @method void warning(string|array $message, ?string $title) A simple warning message
 * @method void info(string|array $message, ?string $title) A simple info message
 * @method void default(string|array $message, ?string $title) A simple default message
 * @method void modal(string|array $message, ?string $title) A simple modal message
 * @method void notify(string|array $message, ?string $title) A simple notify message
 *
 * @version 1.0.1 In development
 * @author Sergey Makhlenko <info@appto.team>
 * @see https://github.com/mahlenko/laravel-flash
 * @see https://appto.team
 */
class LaravelFlash
{
    public function __construct(readonly private string $namespace) {
    }

    public static function namespace(string $namespace): LaravelFlash {
        return new self($namespace);
    }

    public function instance(array $messages): LaravelFlashGroup {
        return new LaravelFlashGroup($this->namespace, $messages);
    }

    public function __call(string $name, array $arguments): void {
        @list($message, $title) = $arguments;

        if (is_string($message)) $message = [$message];
        $this->instance($message)->title($title ?? null)->$name();
    }
}
