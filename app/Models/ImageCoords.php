<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ImageCoords extends Model implements Sortable
{
    use Concerns\HasUuid;
    use SortableTrait;

    protected $fillable = [
        'image_id',
        'coords',
        'order_column',
    ];

    protected $casts = [
        'coords' => 'array',
    ];

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
