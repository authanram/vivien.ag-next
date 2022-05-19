<?php

namespace App;

use App\Models\Color;
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
            ->firstWhere('name', $request->route()?->getName());

        if (is_null($route)) {
            return static::$accentDefault;
        }

        $this->accent = $this->repositories->colors()
            ->getBuilder()
            ->get()
            ->filter(fn (Color $color) => $color->id === $route->menuItems->first()->color_id)
            ->first()
            ?->color;

        return $this->accent ?? static::$accentDefault;
    }
}
