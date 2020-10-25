<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\MenuItem
 *
 * @property int $id
 * @property int $menu_id
 * @property int $route_id
 * @property int $color_id
 * @property string $label
 * @property string|null $dropdown_breakpoint
 * @property bool $published
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Color $color
 * @property-read string $entity_type
 * @property-read \App\Models\Menu $menu
 * @property-read \App\Models\Route $route
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereDropdownBreakpoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuItem extends Model implements Sortable
{
    use SortableTrait;

    protected $table = 'menu_items';

    protected $fillable = [
        'menu_id',
        'route_id',
        'color_id',
        'label',
        'dropdown_breakpoint',
        'published',
        'sort_order',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'sort_on_has_many' => true,
    ];

    final public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    final public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    final public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
