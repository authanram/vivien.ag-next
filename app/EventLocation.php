<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\EventLocation
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\EventLocation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EventLocation whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventLocation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\EventLocation withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class EventLocation extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $table = 'event_locations';

    protected $fillable = [
        'name',
        'description',
        'address',
        'url',
    ];

    final public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
