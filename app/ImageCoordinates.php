<?php

namespace App;

use App\Models\ImageCoordinate as Model;
use Illuminate\Database\Eloquent\Collection;

class ImageCoordinates
{
    protected ?Collection $coordinates = null;

    public function __construct(protected Repositories\ImageCoordinates $repository)
    {
    }

    public function all(): array
    {
        $this->imageCoordinates ??= $this->repository::all();

        $this->coordinates->each(static function (Model $coordinates) {
            $coordinates->setAttribute('coordinatesParsed', static::imageCoordinatesInlineStyleFloatingImage($coordinates));
            $coordinates->getAttribute('image')->setAttribute('path', $coordinates->image->path);
        });

        return [
            'image' => $this->coordinates->map(fn ($coordinates) => $coordinates->getAttribute('image')),
            'imageCoordinates' => $this->coordinates,
        ];
    }

    private static function imageCoordinatesInlineStyleFloatingImage(Model $coordinates): string
    {
        $data = $coordinates->data;

        return sprintf(
            'height:%spx;top:%spx;left:%spx;transform:perspective(%spx) rotate(%sdeg) rotateY(%sdeg) rotateX(%sdeg); z-index:%s;',
            $data->height,
            $data->top,
            $data->left,
            $data->perspective ?? 0,
            $data->rotate ?? 0,
            $data->rotate_y ?? 0,
            $data->rotate_x ?? 0,
            $data->zindex,
        );
    }
}
