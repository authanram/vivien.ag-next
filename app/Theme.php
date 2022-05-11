<?php

namespace App;

use App\Models\Route;
use Illuminate\Http\Request;

class Theme
{
    public function __construct(protected Repositories $repositories)
    {
    }

    protected static string $accentDefault = 'teal';

    protected string $accent = '';

    public function accent(Request $request): string
    {
        if ($this->accent !== '') {
            return $this->accent;
        }

        $route = $this->repositories->routes()
            ->all()
            ->filter(fn (Route $route) => $route->name === $request->route()?->getName())
            ->first();

        if (is_null($route)) {
            return static::$accentDefault;
        }

        $this->accent = $this->repositories->colors()
            ->getBuilder()
            ->get()
            ->filter(fn ($color) => $color->id === $route->menuItems->first()->color_id)
            ->first()
            ?->color;

        return $this->accent ?? static::$accentDefault;
    }
}
