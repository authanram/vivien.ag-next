<?php

namespace App\Repositories;

use App\Models\MenuItem as Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

final class MenuItems extends Repository
{
    public static array $columns = [
        'color_id',
        'label',
        'published',
        'route_id',
    ];

    public function where(string $key, mixed $value): ?Model
    {
        /** @var Model|null $model */
        $model = self::model()->where($key, $value)->first();

        return $model;
    }

    protected static function model(): Builder
    {
        return Model::with(['color:id,color', 'route'])
            ->select(self::$columns)
            ->where('published', true);
    }
}
