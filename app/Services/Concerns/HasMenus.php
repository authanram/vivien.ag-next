<?php

namespace App\Services\Concerns;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

trait HasMenus
{
    protected ?Collection $menus = null;

    public function menus(): array
    {
        $this->imageCoords ??= $this->util->remember(
            Menu::class.'@'.__METHOD__,
            static fn () => static::fetchMenus(),
        );

        $menuItems = $this->menus->pluck('menuItems');

        return [
            'color' => $menuItems->pluck('color'),
            'menu' => $this->menus,
            'menuItem' => $menuItems,
            'route' => $menuItems->pluck('route'),
        ];
    }

    private static function fetchMenus(): Collection
    {
        return Menu::with([
            'menuItems' => static function ($query) {
                $query->select([
                    'id',
                    'menu_id',
                    'route_id',
                    'color_id',
                    'label',
                    'dropdown_breakpoint',
                    'sort_order',
                    'published',
                ]);
            },
            'menuItems.color' => static function ($query) {
                $query->select([
                    'id',
                    'color',
                ]);
            },
            'menuItems.route' => static function ($query) {
                $query->select([
                    'id',
                    'path',
                    'title',
                    'route',
                    'published',
                ]);
            },
        ])->where('published', true)->get(['id', 'slug']);
    }
}
