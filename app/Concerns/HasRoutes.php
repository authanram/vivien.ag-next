<?php

namespace App\Concerns;

use App\Models\Route;
use Illuminate\Database\Eloquent\Collection;

trait HasRoutes
{
    protected ?Collection $routes = null;

    public function routes(array $with = ['menuItems']): Collection
    {
        $this->routes ??= $this->util->remember(
            Route::class.'@'.__METHOD__,
            static fn () => Route::with($with)
                ->where('published', true)
                ->get(['id', 'path', 'route', 'action', 'title']),
        );

        return $this->routes;
    }
}
