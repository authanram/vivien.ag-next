<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\RouteContent
 *
 * @property int $route_id
 * @property int $content_id
 * @property int $sort_order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteContent whereSortOrder($value)
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
