<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class RouteContent extends Pivot implements Sortable
{
    use SortableTrait;

    protected $table = 'route_content';

    public array $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    final public function buildSortQuery(): Builder
    {
        return static::query()->where('content_id', $this->content_id);
    }
}
