<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Content extends Model
{
    use HasTags;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'caption',
        'body',
    ];

    // relations

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }

    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class, 'route_contents')
            ->using(RouteContent::class);
    }
}
