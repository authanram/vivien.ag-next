<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\ImageCoords
 *
 * @property int $id
 * @property string $uuid
 * @property int $image_id
 * @property array $coords
 * @property int $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereCoords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageCoords whereUuid($value)
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class ImageCoords extends Model implements Sortable
{
    use HasUuid;
    use SortableTrait;

    protected $fillable = [
        'uuid',
        'image_id',
        'coords',
        'order_column',
    ];

    protected $casts = [
        'coords' => 'array',
    ];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    final public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
