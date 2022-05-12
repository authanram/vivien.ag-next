<?php

use App\Models\Route as Model;
use Illuminate\Support\Facades\Route;

try {
//    Model::published()->get()
//        ->filter(static function (Model $route) {
//            return is_null($route->present()->controller()) === false;
//        })->each(static function (Model $route) {
//            return Route::get($route->uri, [$route->present()->controller(), 'index'])
//                ->defaults('route', $route)
//                ->middleware($route->middlewares ?? ['web'])
//                ->name($route->name);
//        });
} catch (Exception) {}
