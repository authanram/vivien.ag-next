<?php

namespace App\Models;

use App\Presenters\Models\EventPresenter as Presenter;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use stdClass;

class Event extends Model
{
    use Concerns\HasUuid;
    use HasTags;
    use SoftDeletes;

    protected string $presenter = Presenter::class;

    protected $fillable = [
        'uuid',
        'creator_id',
        'event_template_id',
        'location_id',
        'catering_id',
        'staff_profile_id',
        'description',
        'date_from',
        'date_to',
        'registrations_maximum',
        'registrations_reserved',
        'price',
        'price_note',
        'published',
    ];

    protected $appends = [
        'avatar_path',
        'created_at_readable',
        'date_duration',
        'date_duration_days',
        'date_from_object',
        'date_from_readable',
        'date_to_readable',
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
            $subject->attributes['creator_id'] = auth()->user()->id;
        });
    }

    // attributes

    public function getAvatarPathAttribute(): string
    {
        return asset('images');
    }

    public function getCreatedAtReadableAttribute(): string
    {
        return $this->dateFormat('created_at');
    }

    public function getDateFromObjectAttribute(): stdClass
    {
        return static::makeDateObject($this->date_from);
    }

    public function getDateFromReadableAttribute(): string
    {
        return $this->dateFormat('date_from');
    }

    public function getDateToReadableAttribute(): string
    {
        return $this->dateFormat('date_to');
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

    public function eventRegistrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function eventTemplate(): BelongsTo
    {
        return $this->belongsTo(EventTemplate::class);
    }

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }

    public function catering(): BelongsTo
    {
        return $this->belongsTo(Catering::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function staffProfiles(): BelongsToMany
    {
        return $this->belongsToMany(StaffProfile::class, 'staff_events');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
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
