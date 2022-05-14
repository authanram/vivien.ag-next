<?php

use App\Models\Route as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Route;

try {
    $collection = Model::published()->with('routable')->get();
} catch (QueryException) {}

if (isset($collection) && is_object($collection) && $collection::class === Collection::class) {
    $collection->each(static function (Model $route) {
        return Route::get($route->uri, $route->routable->routable()->toArray())
            ->defaults('route', $route)
            ->middleware($route->middlewares)
            ->name($route->name);
    });
}
