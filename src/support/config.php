<?php

use Makhlenko\LaravelFlash\enums\LaravelFlashType;

return [
    /**
     * Whether to show the default title if they are not specified in the message
     */
    'show_title_defaults' => true,

    /**
     * Default titles
     */
    'titles_default' => [
        LaravelFlashType::SUCCESS->name => 'Completed successfully.',
        LaravelFlashType::ERROR->name => 'Oops! An error has occurred.',
        LaravelFlashType::WARNING->name => 'Important information.',
        LaravelFlashType::INFO->name => 'Informational message.',
        'VALIDATION' => 'Oops! Check the form fields.',
    ],

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
            LaravelFlashType::SUCCESS->name => 'bg-success-100 text-success-700',
            LaravelFlashType::ERROR->name => 'bg-danger-100 text-danger-700',
            LaravelFlashType::WARNING->name => 'bg-warning-100 text-warning-700',
            LaravelFlashType::INFO->name => 'bg-sky-100 text-sky-700',
            LaravelFlashType::DEFAULT->name => 'bg-gray-100 text-gray-700',
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
