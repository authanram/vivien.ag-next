<?php

namespace App\Repositories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class MenuItems extends Repository
{
    protected static Model|string $model = MenuItem::class;

    public static array $columns = [
        'color_id',
        'label',
        'published',
        'route_id',
    ];

    public static function builder(): Builder
    {
        return self::model()::with(['color:id,color', 'route'])
            ->select(self::$columns)
            ->where('published', true);
    }
}
