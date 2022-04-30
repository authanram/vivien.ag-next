<?php

namespace App\Repositories;

use App\Models\Menu as Model;
use App\Models\MenuItem;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class Menus extends Repository
{
    protected static array $columns = [
        'color_id',
        'label',
        'menu_id',
        'order_column',
        'published',
        'route_id',
    ];

    protected static function model(): Builder|string
    {
        return Model::with([
            'menuItems' => fn ($query) => $query
                ->select(self::$columns)
                ->where('published', true)
                ->orderByDesc('menu_items.order_column'),
            'menuItems.color:id,color',
            'menuItems.route',
        ]);
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function footer(): Collection
    {
        return $this->queryBySlug('footer') ?? collect();
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function main(): Collection
    {
        return $this->queryBySlug('main') ?? collect();
    }

    protected function queryBySlug(string $slug): ?Collection
    {
        $callback = static fn (Model $menu) => $menu
            ->menuItems
            ->sortBy('order_column')
            ->values();

        $menu = $this->builder()
            ->where('slug', $slug)
            ->first();

        return optional($menu, $callback);
    }
}
