<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use stdClass;

class Event extends Model
{
    use HasTags;
    use Concerns\HasUuid;
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

    public function getAvatarPathAttribute(): string
    {
        return asset('images');
    }

    public function getCreatedAtReadableAttribute(): string
    {
        return (string)$this->created_at;
    }

    public function getDateFromObjectAttribute(): stdClass
    {
        return static::makeDateObject($this->date_from);
    }

    public function getDateFromReadableAttribute(): string
    {
        return (string)$this->date_from;
    }

    public function getDateToObjectAttribute(): stdClass
    {
        return static::makeDateObject($this->date_to);
    }

    public function getDateDurationAttribute(): string
    {
        $start = $this->date_from;
        $end = $this->date_to;
        $formatDays = '%d ' . trans_choice('project.time.day', $start->diff($end)->d);
        $formatHours = $start->diff($end)->h > 0 ? ' %h ' . __('project.time.abbr_hours') : '';
        $formatMinutes = $start->diff($end)->i > 0 ? ' %i ' . __('project.time.abbr_minutes') : '';

        $value = $start->diff($end)->d > 0
            ? $start->diff($end)->format($formatDays . $formatHours . $formatMinutes)
            : $start->diff($end)->format($formatHours . $formatMinutes);

        return trim($value);
    }

    public function getDateDurationDaysAttribute(): int
    {
        return $this->date_from->diff($this->date_to)->d;
    }

    // scopes

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function scopeStartsBefore(Builder $query, CarbonInterface $date): Builder
    {
        return $query->where('date_from', '<=', $date);
    }

    public function scopeStartsAfter(Builder $query, CarbonInterface $date = null): Builder
    {
        return $query->where('date_to', '>=', $date);
    }

    public function scopeDate(Builder $query, ...$dates): Builder
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

    public function scopeUpcoming(Builder $query): Builder
    {
        return $this->scopeStartsAfter($query, now());
    }

    // relations

    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }

    public function eventLocation(): BelongsTo
    {
        return $this->belongsTo(EventLocation::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }

    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);
    }

    private static function makeDateObject(CarbonInterface $date): stdClass
    {
        return (object) [
            'day' => $date->format('d'),
            'month' => $date->format('m'),
            'month_full' => $date->isoFormat('%B'),
            'year' => $date->format('Y'),
            'hours' => $date->format('H'),
            'minutes' => $date->format('i'),
        ];
    }
}
