<?php

namespace App\Repositories;

use App\Models\MenuItem as Model;
use Illuminate\Database\Eloquent\Builder;

final class MenuItems extends Repository
{
    public static array $columns = [
        'color_id',
        'label',
        'published',
        'route_id',
    ];

    protected static function model(): Builder|Model
    {
        return Model::with(['color:id,color', 'route'])
            ->select(self::$columns)
            ->where('published', true);
    }
}
