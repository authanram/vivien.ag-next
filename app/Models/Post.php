<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasTags;
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'body',
        'published_at',
    ];

    protected $appends = [
        'entity_type',
        'published_at_readable'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $dates = [
        'published_at',
    ];

    // accessors

    final public function getPublishedAtReadableAttribute(): string
    {
        $date = $this->attributes['published_at'];

        return Carbon::createFromTimeString($date);
    }

    // relations

    final public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }
}
