<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\EventType
 *
 * @property int $id
 * @property int $color_id
 * @property int|null $icon_id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Color $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\EventType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereIconId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventType whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\EventType withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class EventType extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $table = 'event_types';

    protected $fillable = [
        'uuid',
        'color_id',
        'name',
        'description',
    ];

    final public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    final public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
