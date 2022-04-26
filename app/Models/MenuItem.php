<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

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

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
