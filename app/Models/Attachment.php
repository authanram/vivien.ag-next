<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

/**
 * App\Models\Attachment
 *
 * @property int $id
 * @property string $uuid
 * @property string $file
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $entity_type
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Attachment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|Attachment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Attachment withoutTrashed()
 * @mixin \Eloquent
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
