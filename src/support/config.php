<?php

use Makhlenko\LaravelFlash\enums\LaravelFlashType;

return [
    /**
     * Used in the presentation template
     */
    'classes' => [
        /**
         * For any type of messages.
         * In the default template, these classes will be combined with classes of a specific type.
         */
        'base' => 'rounded-md text-sm px-4 py-2',

        /**
         * Style classes for the title element
         */
        'title' => 'font-bold',

        /**
         * Style classes for the message list
         */
        'list' => 'flex flex-col gap-y-1 list-disc',

        /**
         * Style classes for a list item
         */
        'item' => 'ml-2',

        /**
         * Additional classes for a specific type of message.
         * Classes for "MODAL" type and "NOTIFY" type are excluded here.
         * Since from most likely you will form a different template.
         *
         * By default, tailwindcss framework.
         */
        'individual' => [
            LaravelFlashType::SUCCESS->name => 'bg-success-100 text-success-600',
            LaravelFlashType::ERROR->name => 'bg-danger-50 text-danger-600',
            LaravelFlashType::WARNING->name => 'bg-warning-100 text-warning-600',
            LaravelFlashType::INFO->name => 'bg-sky-100 text-sky-600',
            LaravelFlashType::DEFAULT->name => 'bg-gray-100 text-gray-600',
        ],

        /**
         * Specify the name of the type used from the validation view.
         */
        'validation' => LaravelFlashType::ERROR->name
    ],

    /**
     * Default messages view used
     */
    'views' => [
        'messages' => 'flash::messages',
        'validation' => 'flash::validation'
    ],

    /**
     * If your application already uses session named 'laravel-flash'
     * in any way, you can replace it.
     *
     * Otherwise, don't change it.
     */
    'session_name' => 'laravel-flash',
];
