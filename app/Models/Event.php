<?php

namespace App\Models;

use App\Contracts\Filterable;
use App\Presenters\EventPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\Tags\HasTags;

class Event extends Model implements Filterable
{
    use HasPresenter;
    use HasTags;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    public static function filters(): array
    {
        return [
            AllowedFilter::exact('category', 'eventTemplate.id'),
            AllowedFilter::exact('tag', 'tags.id'),
        ];
    }

    protected $fillable = [
        'uuid',
        'creator_id',
        'event_template_id',
        'location_id',
        'catering_id',
        'staff_id',
        'description',
        'date_from',
        'date_to',
        'registrations_maximum',
        'registrations_reserved',
        'price',
        'price_note',
        'published',
    ];

    protected $dates = [
        'date_from',
        'date_to',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public static function queryFilters(): array
    {
        return [
            AllowedFilter::exact('tags', 'tags.id'),
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(static function (Model $subject): void {
            $subject->attributes['creator_id'] = auth()->user()->id;
        });
    }

    // relations

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }

    public function catering(): BelongsTo
    {
        return $this->belongsTo(Catering::class);
    }

    public function eventRegistrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function eventTemplate(): BelongsTo
    {
        return $this->belongsTo(EventTemplate::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function staff(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class, 'staff_events');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
