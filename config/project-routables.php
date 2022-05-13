<?php

use App\Nova as Resources;
use App\Http\Controllers;

return [

    'resources' => [
        //Resources\Author::class,
        Resources\Controller::class,
        Resources\ContentView::class,
        //Resources\Event::class,
        //Resources\Location::class,
        //Resources\Post::class,
        //Resources\Quote::class,
        //Resources\Tag::class,
    ],

    'controllers' => [
        Controllers\BlogController::class,
        Controllers\BooksController::class,
        Controllers\CookiePolicyController::class,
        Controllers\EventsController::class,
        Controllers\GalleryController::class,
        Controllers\WelcomeController::class,
    ]

];
