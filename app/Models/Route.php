<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'path',
        'route',
        'action',
        'title',
        'published',
    ];

    public function contentViews(): BelongsToMany
    {
        return $this->belongsToMany(ContentView::class, 'route_content_views')
            ->withPivot('section', 'published', 'order_column');
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
