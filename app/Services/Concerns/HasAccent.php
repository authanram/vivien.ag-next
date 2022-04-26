<?php

namespace App\Services\Concerns;

use App\Models\Route;
use Illuminate\Http\Request;

trait HasAccent
{
    protected static string $accentDefault = 'teal';

    protected string $accent = '';

    public function accent(Request $request): string
    {
        if ($this->accent !== '') {
            return $this->accent;
        }

        $route = $this->routes()
            ->filter(fn (Route $route) => $route->route === $request->route()?->getName())
            ->first();

        if (is_null($route)) {
            return static::$accentDefault;
        }

        $this->accent = $this->colors()
            ->filter(fn ($color) => $color->id === $route->menuItems->first()->color_id)
            ->first()
            ?->color;

        return $this->accent ?? static::$accentDefault;
    }
}
