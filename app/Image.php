<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Tags\HasTags;

/**
 * App\Image
 *
 * @property int $id
 * @property string $uuid
 * @property string $file
 * @property string $file_original
 * @property string|null $name
 * @property string|null $description
 * @property int|null $price
 * @property int $order_column
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $path
 * @property-read \App\ImageCoords|null $imageCoords
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Image onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereFileOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Image withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Image withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class Image extends Model implements Sortable
{
    use HasTags;
    use HasUuid;
    use SoftDeletes;
    use SortableTrait;

    protected $fillable = [
        'uuid',
        'file',
        'file_original',
        'name',
        'description',
        'price',
        'published',
        'order_column',
    ];

    protected $casts = [
        'published' => 'bool',
    ];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    final public function getPathAttribute(): string
    {
        return "/storage/$this->file";
    }

    final public function imageCoords(): HasOne
    {
        return $this->hasOne(ImageCoords::class);
    }
}
