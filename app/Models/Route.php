<?php

namespace App\Models;

use App\Presenters\Models\RoutePresenter as Presenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method Presenter present()
 */
class Route extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'uri',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function routable(): MorphTo
    {
        return $this->morphTo();
    }
}
