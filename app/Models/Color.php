<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $uuid
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventType[] $eventTypes
 * @property-read int|null $event_types_count
 * @property-read string $entity_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuItem[] $menuItems
 * @property-read int|null $menu_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Color withoutTrashed()
 * @mixin \Eloquent
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
