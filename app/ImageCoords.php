<?php

namespace App;

use App\Models\ImageCoords as Model;
use Illuminate\Database\Eloquent\Collection;

class ImageCoords
{
    protected ?Collection $imageCoords = null;

    public function __construct(protected Repositories\ImageCoords $repository)
    {
    }

    public function all(): array
    {
        $this->imageCoords ??= $this->repository::all();

        $this->imageCoords->each(static function (Model $coord) {
            $coord->setAttribute('coordsParsed', static::imageCoordsInlineStyleFloatingImage($coord));
            $coord->getAttribute('image')->setAttribute('path', $coord->image->path);
        });

        return [
            'image' => $this->imageCoords->map(fn ($imageCoord) => $imageCoord->getAttribute('image')),
            'imageCoord' => $this->imageCoords,
        ];
    }

    private static function imageCoordsInlineStyleFloatingImage(Model $imageCoords): string
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
}
