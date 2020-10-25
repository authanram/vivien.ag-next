<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

/**
 * App\Models\Content
 *
 * @property int $id
 * @property string $uuid
 * @property string $slug
 * @property string|null $caption
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read string $entity_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Route[] $routes
 * @property-read int|null $routes_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Query\Builder|Content onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Content withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Content withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Content withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|Content withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Content withoutTrashed()
 * @mixin \Eloquent
 */
class Content extends Model
{
    use HasTags;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'slug',
        'caption',
        'body',
    ];

    // relations

    final public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'actionable');
    }

    final public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class, 'route_content')
            ->using(RouteContent::class);
    }
}
