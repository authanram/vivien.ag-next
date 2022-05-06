<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Url
{
    public static function filterUrlGenerator(Request $request, array $filters): FilterUrlGenerator
    {
        return new FilterUrlGenerator($request, $filters);
    }

    public static function fromRoute(string $route, mixed $default = '#'): mixed
    {
        return Route::has($route) ? route($route) : $default;
    }
}
