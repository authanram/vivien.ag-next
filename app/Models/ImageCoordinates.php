<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class ImageCoordinates extends Model
{
    /** @use HasFactory<\Database\Factories\ImageCoordinatesFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    protected $casts = [
        'coords' => 'array',
    ];

    final public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
