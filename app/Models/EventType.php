<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\EventType
 *
 * @property int $id
 * @property int $color_id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Color $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|EventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventType newQuery()
 * @method static \Illuminate\Database\Query\Builder|EventType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventType whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|EventType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EventType withoutTrashed()
 * @mixin \Eloquent
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
