<?php

namespace Makhlenko\LaravelFlash\entities;

use Makhlenko\LaravelFlash\enums\LaravelFlashType;

class LaravelFlashGroup
{
    /**
     * @var string
     */
    private string $namespace;

    /**
     * @var string|null
     */
    private ?string $title = null;

    /**
     * @var array<string>|null
     */
    private array $messages;

    /**
     * @var array<LaravelFlashLink>
     */
    private array $links = [];

    /**
     * @var array<LaravelFlashButton>
     */
    private array $buttons = [];

    public function __construct(string $namespace, array $messages) {
        $this->namespace = $namespace;
        $this->messages = $messages;
    }

    /**
     * Add a message block header
     * @param string|null $text
     * @return $this
     */
    public function title(string $text = null): static {
        if (!empty($text)) {
            $this->title = trim($text);
        }

        return $this;
    }

    /**
     * Attach links to a message
     * @param string $text
     * @param string $href
     * @return $this
     */
    public function link(string $text, string $href): static {
        $this->links[] = new LaravelFlashLink($text, $href);
        return $this;
    }

    /**
     * Attach buttons to a message
     * @param string $text
     * @param string $action
     * @return $this
     */
    public function button(string $text, string $action): static {
        $this->buttons[] = new LaravelFlashButton($text, $action);
        return $this;
    }

    /**
     * Saves flash messages to the session
     * @param LaravelFlashType $type
     * @return void
     */
    public function flush(LaravelFlashType $type): void {
        session()->flash(
            laravel_flash_session_name($type, $this->namespace),
            (object) [
                'namespace' => $this->namespace,
                'type' => $type->name,
                'title' => $this->title,
                'messages' => $this->messages,
                'links' => $this->links,
                'buttons' => $this->buttons,
                'length' => count($this->messages)
            ]
        );
    }

    public function __call(string $name, array $arguments) {
        $type = LaravelFlashType::fromName($name);
        $this->flush($type);
    }
}