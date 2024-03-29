<?php

use App\Contracts\DataServiceContract;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/local.php';

try {

    $routes = resolve(DataServiceContract::class)->getRoutes();

} catch (\Exception $e) {

    $routes = [];

}

/** @var \App\Models\Route $route */
foreach ($routes as $route) {

    Route::get($route->getAttribute('path'), $route->getAttribute('action'))

        ->defaults('routeId', $route->getAttribute('id'))

        ->name($route->getAttribute('route'));

}
