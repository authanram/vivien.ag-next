<?php

use Illuminate\Support\Facades\Route;

try {
    $routes = util()->data()->getRoutes();
} catch (Exception) {
    $routes = [];
}

/** @var \App\Models\Route $route */
foreach ($routes as $route) {
    Route::get($route->path, $route->action)
        ->defaults('routeId', $route->id)
        ->name($route->route);
}
