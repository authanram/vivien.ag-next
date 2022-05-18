<?php

namespace App\Models;

use App\Contracts\Routable;
use App\Presenters\RoutePresenter as Presenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'uri',
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

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function routable(): MorphTo
    {
        return $this->morphTo();
    }
}
