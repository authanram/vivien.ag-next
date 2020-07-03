<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

/**
 * App\Attachment
 *
 * @property int $id
 * @property string $uuid
 * @property string $file
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Attachment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Attachment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Attachment withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class Attachment extends Model
{
    use HasTags;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'file',
    ];
}
