<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class ImageCoordinates extends Repository
{
    public static function builder(): Builder
    {
        return self::model()::with([
            'image' => static fn (BelongsTo $query) => $query->select([
                'id',
                'file',
                'name',
                'description',
                'price',
                'order_column',
            ]),
        ])->orderBy('order_column');
    }

    public static function all(): Collection
    {
        return self::builder()->get([
            'id',
            'data',
            'image_id',
        ]);
    }
}
