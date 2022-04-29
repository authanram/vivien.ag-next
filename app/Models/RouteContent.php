<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class RouteContent extends Pivot implements Sortable
{
    use SortableTrait;

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public function buildSortQuery(): Builder
    {
        return static::query()->where('content_id', $this->content_id);
    }
}
