<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Route
 *
 * @property int $id
 * @property string $uuid
 * @property string $path
 * @property string $route
 * @property string $action
 * @property string $title
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Content[] $contents
 * @property-read int|null $contents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MenuItem[] $menuItems
 * @property-read int|null $menu_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Route onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Route withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Route withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class Route extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'path',
        'route',
        'action',
        'title',
        'published',
    ];

    final public function contents(): BelongsToMany
    {
        return $this->belongsToMany(Content::class, 'route_content')
            ->using(RouteContent::class);
    }

    final public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
