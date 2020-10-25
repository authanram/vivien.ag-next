<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\RouteContent
 *
 * @property int $route_id
 * @property int $content_id
 * @property int $sort_order
 * @method static Builder|RouteContent newModelQuery()
 * @method static Builder|RouteContent newQuery()
 * @method static Builder|RouteContent ordered($direction = 'asc')
 * @method static Builder|RouteContent query()
 * @method static Builder|RouteContent whereContentId($value)
 * @method static Builder|RouteContent whereRouteId($value)
 * @method static Builder|RouteContent whereSortOrder($value)
 * @mixin \Eloquent
 */
class RouteContent extends Pivot implements Sortable
{
    use SortableTrait;

    protected $table = 'route_content';

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    final public function buildSortQuery(): Builder
    {
        return static::query()->where('content_id', $this->content_id);
    }
}
