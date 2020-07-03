<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Menu
 *
 * @property int $id
 * @property string $uuid
 * @property string $slug
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MenuItem[] $menuItems
 * @property-read int|null $menu_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Menu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Menu withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Menu withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu withCacheCooldownSeconds($seconds = null)
 * @property-read string $entity_type
 */
class Menu extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'slug',
        'published',
    ];

    final public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }
}
