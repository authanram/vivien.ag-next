<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\ImageCoords
 *
 * @property int $id
 * @property string $uuid
 * @property int $image_id
 * @property array $coords
 * @property int $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $entity_type
 * @property-read \App\Models\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereCoords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCoords whereUuid($value)
 * @mixin \Eloquent
 */
class ImageCoords extends Model implements Sortable
{
    use Concerns\HasUuid;
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
