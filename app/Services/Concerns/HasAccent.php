<?php

namespace App\Services\Concerns;

use App\Route;
use Illuminate\Http\Request;

trait HasAccent
{
    protected ?string $accent = null;

    final public function getAccent(Request $request): string
    {
        if (!$this->accent) {
            $routeName = optional($request->route())->getName();

            $fn = fn (Route $route) => $route->getAttribute('route') === $routeName;

            $route = $this->getRoutes()->filter($fn)->first();

            if (!$route) {

                return 'teal';

            }

            $menuItem = $route->menuItems->first();

            $colorId = $menuItem->getAttribute('color_id');

            $color = $this->getColors()->filter(fn ($color) => $color->id === $colorId)->first();

            $this->accent = $color->getAttribute('color');
        }

        return $this->accent;
    }
}
