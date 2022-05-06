<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

final class Menus extends Repository
{
    protected static Model|string $model = Menu::class;

    protected static array $columns = [
        'color_id',
        'label',
        'menu_id',
        'order_column',
        'published',
        'route_id',
    ];

    public static function builder(): Builder
    {
        return self::model()::with([
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
        return $this->findBySlug('footer') ?? collect();
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function main(): Collection
    {
        return $this->findBySlug('main') ?? collect();
    }

    protected function findBySlug(string $slug): ?Collection
    {
        return $this->getBuilder()
            ->where('slug', $slug)
            ->first()
            ->menuItems;
    }
}
