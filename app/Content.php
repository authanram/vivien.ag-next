<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

/**
 * App\Content
 *
 * @property int $id
 * @property string $uuid
 * @property string $slug
 * @property string|null $caption
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Route[] $routes
 * @property-read int|null $routes_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Content onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Content withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Content withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
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
