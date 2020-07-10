<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

/**
 * App\Event
 *
 * @property int $id
 * @property int $creator_id
 * @property int|null $event_type_id
 * @property int|null $event_location_id
 * @property string $uuid
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $date_from
 * @property \Illuminate\Support\Carbon $date_to
 * @property int $maximum_attendees
 * @property int|null $reserved_seats
 * @property int|null $price
 * @property string|null $price_note
 * @property string $catering
 * @property string|null $lead
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Attendee[] $attendees
 * @property-read int|null $attendees_count
 * @property-read \App\EventLocation|null $eventLocation
 * @property-read \App\EventType|null $eventType
 * @property-read string $avatar_path
 * @property-read string $created_at_readable
 * @property-read string $date_duration
 * @property-read int $date_duration_days
 * @property-read \stdClass $date_from_object
 * @property-read \stdClass $date_to_object
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event date($dates)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event startsAfter(\Carbon\CarbonInterface $date = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event startsBefore(\Carbon\CarbonInterface $date)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event upcoming()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCatering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereEventLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereEventTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereMaximumAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event wherePriceNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereReservedSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event withCategories($categories)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Event withTags($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Event withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $date_from_readable
 * @property-read string $entity_type
 */
class Event extends Model
{
    use HasTags;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'creator_id',
        'event_type_id',
        'event_location_id',
        'description',
        'date_from',
        'date_to',
        'maximum_attendees',
        'reserved_seats',
        'price',
        'price_note',
        'catering',
        'lead',
        'published',
    ];

    protected $appends = [
        'avatar_path',
        'created_at_readable',
        'date_duration',
        'date_duration_days',
        'date_from_object',
        'date_from_readable',
        'date_to_object',
    ];

    protected $dates = [
        'date_from',
        'date_to',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(static function (Model $subject): void {
            $subject->attributes['creator_id'] = data_get(auth(), 'user.id', 1);
        });
    }

    // attributes

    final public function getAvatarPathAttribute(): string
    {
        return asset('images');
    }

    final public function getCreatedAtReadableAttribute(): string
    {
        return carbon($this->attributes['created_at'])->format(dateFormat());
    }

    final public function getDateFromObjectAttribute(): \stdClass
    {
        $date = carbon($this->attributes['date_from']);

        return static::makeDateObject($date);
    }

    final public function getDateFromReadableAttribute(): string
    {
        return carbon($this->attributes['date_from'])->format(dateFormat());
    }

    final public function getDateToObjectAttribute(): \stdClass
    {
        $date = carbon($this->attributes['date_to']);

        return static::makeDateObject($date);
    }

    final public function getDateDurationAttribute(): string
    {
        $start = carbon($this->attributes['date_from']);

        $end = carbon($this->attributes['date_to']);

        $formatDays = '%d ' . trans_choice('project.time.day', $start->diff($end)->d);

        $formatHours = $start->diff($end)->h > 0 ? ' %h ' . __('project.time.abbr_hours') : '';

        $formatMinutes = $start->diff($end)->i > 0 ? ' %i ' . __('project.time.abbr_minutes') : '';

        $value = $start->diff($end)->d > 0

            ? $start->diff($end)->format($formatDays . $formatHours . $formatMinutes)

            : $start->diff($end)->format($formatHours . $formatMinutes);

        return trim($value);
    }

    final public function getDateDurationDaysAttribute(): int
    {
        $start = carbon($this->attributes['date_from']);

        $end = carbon($this->attributes['date_to']);

        return (int)$start->diff($end)->d;
    }

    // scopes

    final public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    final public function scopeStartsBefore(Builder $query, CarbonInterface $date): Builder
    {
        return $query->where('date_from', '<=', $date);
    }

    final public function scopeStartsAfter(Builder $query, CarbonInterface $date = null): Builder
    {
        return $query->where('date_to', '>=', $date);
    }

    final public function scopeDate(Builder $query, ...$dates): Builder
    {
        foreach ($dates as $key => $date) {
            $method = $key === 0 ? 'whereBetween' : 'orWhereBetween';

            $query->$method('date_from', [

                Carbon::createFromDate($date)->startOfMonth(),

                Carbon::createFromDate($date)->endOfMonth()

            ]);
        }

        return $query;
    }

    final public function scopeUpcoming(Builder $query): Builder
    {
        return $this->scopeStartsAfter($query, carbon());
    }

    // relations

    final public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }

    final public function eventLocation(): BelongsTo
    {
        return $this->belongsTo(EventLocation::class);
    }

    final public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    final public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }

    final public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);
    }

    private static function makeDateObject(CarbonInterface $date): \stdClass
    {
        return (object) [
            'day' => $date->format('d'),
            'month' => $date->format('m'),
            'month_full' => $date->formatLocalized('%B'),
            'year' => $date->format('Y'),
            'hours' => $date->format('H'),
            'minutes' => $date->format('i'),
        ];
    }
}
