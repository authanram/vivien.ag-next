<?php

namespace App\Services\Concerns;

use App\Route;
use Illuminate\Database\Eloquent\Collection;

trait HasRoutes
{
    protected ?Collection $routes = null;

    final public function getRoutes(array $with = ['menuItems']): Collection
    {
        if (!$this->routes) {
            $this->routes = Route::with($with)

                ->where('published', true)

                ->get(['id', 'path', 'route', 'action', 'title']);
        }

        return $this->routes;
    }
}
