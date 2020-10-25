<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\EventLocation
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property string|null $address
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation newQuery()
 * @method static \Illuminate\Database\Query\Builder|EventLocation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventLocation whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|EventLocation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EventLocation withoutTrashed()
 * @mixin \Eloquent
 */
class EventLocation extends Model
{
    use Concerns\HasUuid;
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
