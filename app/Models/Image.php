<?php

namespace App\Models;

use App\Enums\ImageArtist;
use App\Traits\HasUuids;
use Database\Factories\ImageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Image extends Model implements HasMedia
{
    /** @use HasFactory<ImageFactory> */
    use HasFactory;

    use HasUuids;
    use InteractsWithMedia;
    use SoftDeletes;
    use Userstamps;

    protected $casts = [
        'artist' => ImageArtist::class,
        'published' => 'bool',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->height(300)
            ->keepOriginalImageFormat()
            ->queued();
    }

    final public function imageCoordinates(): HasOne
    {
        return $this->hasOne(ImageCoordinates::class);
    }
}
