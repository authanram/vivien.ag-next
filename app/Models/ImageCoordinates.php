<?php

namespace App\Models;

use App\Traits\HasUuids;
use Database\Factories\ImageCoordinatesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class ImageCoordinates extends Model
{
    /** @use HasFactory<ImageCoordinatesFactory> */
    use HasFactory;

    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    protected $casts = [
        'coordinates' => 'array',
    ];

    final public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
