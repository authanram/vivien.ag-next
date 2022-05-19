<?php

namespace App\Models;

//use App\Presenters\MenuItemPresenter as Presenter;
use App\Contracts\Presentable;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * @method bool isActive()
 * @method string colorCode()
 * @method string href()
 */
class MenuItem extends Eloquent implements Presentable, Sortable
{
    use PresentableTrait;
    //use HasPresenter;
    use SortableTrait;

    //public static string $presenter = Presenter::class;

    protected $fillable = [
        'menu_id',
        'route_id',
        'color_id',
        'label',
        'published',
        'order_column',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
        'sort_on_has_many' => true,
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
}
