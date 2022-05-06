<?php

namespace App\Concerns;

use App\Models\ImageCoords;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasImageCoords
{
    protected ?Collection $imageCoords = null;

    public function imageCoords(): array
    {
        $this->imageCoords ??= $this->util->remember(
            ImageCoords::class.'@'.__METHOD__,
            static fn () => static::fetchImageCoords(),
        );

        $this->imageCoords->each(static function (ImageCoords $coord) {
            $coord->setAttribute('coordsParsed', static::imageCoordsInlineStyleFloatingImage($coord));
            $coord->getAttribute('image')->setAttribute('path', $coord->image->path);
        });

        return [
            'image' => $this->imageCoords->map(fn ($imageCoord) => $imageCoord->getAttribute('image')),
            'imageCoord' => $this->imageCoords,
        ];
    }

    private static function imageCoordsInlineStyleFloatingImage(ImageCoords $imageCoords): string
    {
        $coords = (object)$imageCoords->coords;

        return sprintf(
            'height:%spx;top:%spx;left:%spx;transform:perspective(%spx) rotate(%sdeg) rotateY(%sdeg) rotateX(%sdeg); z-index:%s;',
            $coords->height,
            $coords->top,
            $coords->left,
            $coords->perspective ?? 0,
            $coords->rotate ?? 0,
            $coords->rotate_y ?? 0,
            $coords->rotate_x ?? 0,
            $coords->zindex,
        );
    }

    private static function fetchImageCoords(): Collection
    {
        $with = [
            'image' => static fn (BelongsTo $query) => $query->select([
                'id',
                'file',
                'name',
                'description',
                'price',
                'order_column',
            ]),
        ];

        return ImageCoords::with($with)
            ->orderBy('order_column')
            ->get(['id', 'coords', 'image_id']);
    }
}
