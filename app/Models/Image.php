<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Image extends Model implements Sortable
{
    use SoftDeletes;
    use SortableTrait;

    protected $fillable = [
        'file',
        'file_original',
        'name',
        'description',
        'price',
        'published',
        'order_column',
    ];

    protected $casts = [
        'published' => 'bool',
    ];

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public function getPathAttribute(): string
    {
        return storage_path($this->file);
    }
}
