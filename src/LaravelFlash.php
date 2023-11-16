<?php

namespace Makhlenko\LaravelFlash;

use Exception;
use Illuminate\Support\Collection;

class LaravelFlash
{
    private null|string|Collection $messages = null;

    public function __construct(
        private readonly ?string $namespace = null
    ) {
    }

    public function success(string|array|Collection $message = null): void {
        $this->push($message)->execute(FlashType::SUCCESS);
    }

    public function error(string|array|Collection $message = null): void {
        $this->push($message)->execute(FlashType::ERROR);
    }

    public function warning(string|array|Collection $message = null): void {
        $this->push($message)->execute(FlashType::WARNING);
    }

    public function info(string|array|Collection $message = null): void {
        $this->push($message)->execute(FlashType::INFO);
    }

    public function message(string|array|Collection $message = null): void {
        $this->push($message)->execute(FlashType::MESSAGE);
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
            FlashType::SUCCESS->name => self::get(FlashType::SUCCESS, $namespace),
            FlashType::ERROR->name => self::get(FlashType::ERROR, $namespace),
            FlashType::WARNING->name => self::get(FlashType::WARNING, $namespace),
            FlashType::INFO->name => self::get(FlashType::INFO, $namespace),
            FlashType::MESSAGE->name => self::get(FlashType::MESSAGE, $namespace)
        ])->filter();
    }

    /**
     * Validation css classes
     * @return string
     */
    public static function validationClass(): string {
        $all_classes = config('flash.messages.classes');
        $validation_class = config('flash.validations.classes');

        if (is_string($validation_class)) {
            return $validation_class;
        }

        if ($validation_class instanceof FlashType && key_exists($validation_class->name, $validation_class)) {
            return $all_classes[$validation_class->name];
        }

        return '';
    }

    /**
     * Return collect message type
     * @param string $type
     * @param string|null $namespace
     */
    private static function get(FlashType $type = FlashType::MESSAGE, string $namespace = null): ?Collection {
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
    private function execute(FlashType $type): void {
        session()->flash(
            self::getSessionNamespace($type, $this->namespace),
            $this->messages);
    }

    /**
     * @param string $type
     * @param string|null $namespace
     * @return string
     */
    private static function getSessionNamespace(FlashType $type, string $namespace = null): string {
        return $namespace
            ? 'laravel-flash::'.$namespace.'::'.$type->name
            : 'laravel-flash::'.$type->name;
    }
}
