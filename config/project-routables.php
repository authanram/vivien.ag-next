<?php

use App\Nova\RouteAction;
use App\Nova\Page;

return [

    'controllers' => [
        //
    ],

    'middlewares' => [
        'web',
        'auth',
    ],

    'routables' => [
        RouteAction::class,
        Page::class,
    ],

];
