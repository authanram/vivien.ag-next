<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Color
 *
 * @property int $id
 * @property string $uuid
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\EventType[] $eventTypes
 * @property-read int|null $event_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MenuItem[] $menuItems
 * @property-read int|null $menu_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Color withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class Color extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'color',
    ];

    final public function eventTypes(): HasMany
    {
        return $this->hasMany(EventType::class);
    }

    final public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    final public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
