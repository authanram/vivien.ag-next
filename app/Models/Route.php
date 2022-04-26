<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'path',
        'route',
        'action',
        'title',
        'published',
    ];

    final public function contents(): BelongsToMany
    {
        return $this->belongsToMany(Content::class, 'route_content')
            ->using(RouteContent::class);
    }

    final public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
