<?php

namespace Makhlenko\LaravelFlash;

use Exception;
use Illuminate\Support\Collection;

class LaravelFlash
{
    /**
     * Available types
     */
    const SUCCESS = 'success';
    const ERROR = 'error';
    const WARNING = 'warning';
    const INFO = 'info';

    private null|string|Collection $messages = null;

    public function __construct(
        private readonly ?string $namespace = null
    ) {
    }

    public function success(string|array|Collection $message = null): void {
        $this->push($message)->execute(self::SUCCESS);
    }

    public function error(string|array|Collection $message = null): void {
        $this->push($message)->execute(self::ERROR);
    }

    public function warning(string|array|Collection $message = null): void {
        $this->push($message)->execute(self::WARNING);
    }

    public function info(string|array|Collection $message = null): void {
        $this->push($message)->execute(self::INFO);
    }

    public static function instance(string $namespace = null): static {
        return new static($namespace);
    }

    /**
     * All messages collection
     * @param string|null $namespace
     * @return Collection
     */
    public static function all(string $namespace = null): Collection {
        return collect([
            self::SUCCESS => self::get(self::SUCCESS, $namespace),
            self::ERROR => self::get(self::ERROR, $namespace),
            self::WARNING => self::get(self::WARNING, $namespace),
            self::INFO => self::get(self::INFO, $namespace),
        ])->filter();
    }

    /**
     * Validation css classes
     * @return string
     */
    public static function validationClass(): string {
        $classes = config('flash.messages.classes');
        return key_exists(config('flash.validations.classes'), $classes)
            ? $classes[config('flash.validations.classes')]
            : config('flash.validations.classes');
    }

    /**
     * Return collect message type
     * @param string $type
     * @param string|null $namespace
     */
    private static function get(string $type = self::SUCCESS, string $namespace = null): ?Collection {
        try {
            $key = self::getSessionNamespace($type, $namespace);
            return session()->get($key);
        } catch (Exception) {
            return null;
        }
    }

    /**
     * @param string|array|Collection|null $messages
     * @return static
     */
    private function push(null|string|array|Collection $messages): static {
        if ($messages) {
            if (!$messages instanceof Collection) {
                $messages = collect($messages);
            }

            $this->messages = $messages;
        }

        return $this;
    }

    /**
     * Store flash message
     * @param string $type
     * @return void
     */
    private function execute(string $type): void {
        session()->flash(
            self::getSessionNamespace($type, $this->namespace),
            $this->messages);
    }

    /**
     * @param string $type
     * @param string|null $namespace
     * @return string
     */
    private static function getSessionNamespace(string $type, string $namespace = null): string {
        return $namespace
            ? 'laravel-flash::'.$namespace.'::'.$type
            : 'laravel-flash::'.$type;
    }
}
