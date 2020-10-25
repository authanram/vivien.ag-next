<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Route
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Content[] $contents
 * @property-read int|null $contents_count
 * @property-read string $entity_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuItem[] $menuItems
 * @property-read int|null $menu_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Route newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Route newQuery()
 * @method static \Illuminate\Database\Query\Builder|Route onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Route query()
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Route whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Route withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Route withoutTrashed()
 * @mixin \Eloquent
 */
class Route extends Model
{
    use Concerns\HasUuid;
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
