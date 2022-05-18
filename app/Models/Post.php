<?php

namespace App\Models;

use App\Presenters\PostPresenter as Presenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasPresenter;
    use HasTags;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'uuid',
        'slug',
        'title',
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

    public function body(): Attribute
    {
        return Attribute::make(
            set: static fn ($value) => str_replace(
                ["  \r\n", "\r\n"],
                ["\r\n", "  \r\n"],
                $value,
            ),
        );
    }

    public function getPublishedAtReadableAttribute(): string
    {
        $date = $this->attributes['published_at'];

        return Carbon::createFromTimeString($date);
    }

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }
}
