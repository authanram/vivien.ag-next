<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Tags\HasTags;

/**
 * App\Models\Image
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
 * @property-read string $entity_type
 * @property-read string $path
 * @property-read \App\Models\ImageCoords|null $imageCoords
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Query\Builder|Image onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Image ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereFileOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Image withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Image withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Image withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|Image withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Image withoutTrashed()
 * @mixin \Eloquent
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
