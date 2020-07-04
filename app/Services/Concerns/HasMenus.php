<?php

namespace App\Services\Concerns;

use App\Menu;
use Illuminate\Database\Eloquent\Collection;

trait HasMenus
{
    protected ?Collection $menus = null;

    final public function getMenus(): array
    {
        if (!$this->menus) {

            $this->menus = Menu::with([
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
                        'published',
                    ]);
                },
            ])
                ->where('published', true)
                ->get(['id', 'slug']);

        }

        $menuItems = $this->menus->pluck('menuItems');

        return [

            'color' => $menuItems->pluck('color'),

            'menu' => $this->menus,

            'menuItem' => $menuItems,

            'route' => $menuItems->pluck('route'),

        ];
    }
}
