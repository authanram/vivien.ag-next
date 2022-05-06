<?php

use Illuminate\Support\Facades\Route;

/** @var \App\Models\Route $route */
foreach (Site::repositories()->routes()->all() as $route) {
    Route::get($route->path, $route->action)
        ->defaults('routeId', $route->id)
        ->name($route->route);
}
