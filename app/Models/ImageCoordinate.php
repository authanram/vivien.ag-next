<?php

namespace App\Models;

use App\Presenters\ImageCoordinatePresenter as Presenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ImageCoordinate extends Model implements Sortable
{
    use HasPresenter;
    use SoftDeletes;
    use SortableTrait;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $attributes = [
        'data' => '{}',
    ];

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];
}
