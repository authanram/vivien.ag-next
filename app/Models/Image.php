<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Image extends Model implements Sortable
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Userstamps;
    use SortableTrait;

    protected $casts = [
        'published' => 'bool',
    ];

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    final public function imageCoordinates(): HasOne
    {
        return $this->hasOne(imageCoordinates::class);
    }
}
