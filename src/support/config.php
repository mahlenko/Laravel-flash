<?php

use Makhlenko\LaravelFlash\FlashType;
use Makhlenko\LaravelFlash\LaravelFlash;

/**
 * Just use LaravelFlash::get() in your template to get a collection of messages.
 * You can specify the type of messages: success, error, warning or info.
 */
return [
    /**
     * The path to the template for viewing all messages
     */
    'view' => 'flash::all',

    /**
     *
     */
    'messages' => [
        /*
         * Path to messages view.
         */
        'view' => 'flash::messages',

        /**
         * Classes for the message block
         */
        'classes' => [
            FlashType::SUCCESS->name => 'bg-success-50 text-success-600',
            FlashType::ERROR->name => 'bg-danger-50 text-danger-600',
            FlashType::WARNING->name => 'bg-warning-50 text-warning-600',
            FlashType::INFO->name => 'bg-brand-50 text-brand-600',
            FlashType::MESSAGE->name => 'bg-gray-100 text-gray-600',
        ],

        /**
         * Base classes of all message types
         */
        'base_classes' => 'px-4 py-2 text-sm rounded-md'
    ],

    /**
     * The package can use the included generic error list view when a validation occurs.
     */
    'validations' => [
        /**
         * Determine if the package will use the included validations errors view.
         */
        'enabled' => true,

        /**
         * Path to errors view. Only available if "validations.enabled" is true.
         */
        'view' => 'flash::validations',

        /**
         * Classes for the validation errors block.
         * You can specify 1 of the message types, or write your own list of classes separated by a space.
         * Available types: LaravelFlash::SUCCESS, LaravelFlash::ERROR, LaravelFlash::WARNING, LaravelFlash::INFO
         */
        'classes' => LaravelFlash::ERROR,
    ]
];
