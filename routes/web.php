<?php

use App\Http\Controllers\ContentViewController;
use App\Models\Route as Model;
use Illuminate\Support\Facades\Route;

try {
    Model::published()->get()->each(static function (Model $route) {
        Route::get($route->uri, [ContentViewController::class, 'index'])
            ->defaults('route', $route)
            ->middleware($route->middlewares ?? ['web'])
            ->name($route->name);
    });
} catch (Exception) {}
