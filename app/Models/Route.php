<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uri',
        'name',
        'middlewares',
        'published',
    ];

    protected $casts = [
        'middlewares' => 'array',
        'published' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function contentView(): BelongsTo
    {
        return $this->belongsTo(ContentView::class);
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
