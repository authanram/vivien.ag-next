<?php

use App\Models\Route as Model;
use Illuminate\Support\Facades\Route;

try {
    Model::published()->get()
        ->filter(static function (Model $route) {
            try {
                return $route->present()->resolveAction();
            } catch (InvalidArgumentException) {
                return false;
            }
        })->each(static function (Model $route) {
            return Route::get($route->uri, [
                $route->present()->resolveAction()->controller(),
                $route->present()->resolveAction()->action(),
            ])->defaults('route', $route)
                ->middleware($route->middlewares ?? ['web'])
                ->name($route->name);
        });
} catch (Exception) {}
