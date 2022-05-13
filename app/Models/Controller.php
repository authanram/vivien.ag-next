<?php

namespace App\Models;

use App\Contracts\Renderable;
use App\Contracts\Renderer;
use App\Renderers\ControllerRenderer;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;
use Sushi\Sushi;

class Controller extends Model implements Renderable
{
    use Sushi;

    public bool $readonly = true;

    public static function renderer(): Renderer|string
    {
        return ControllerRenderer::class;
    }

    public function getRows(): array
    {
        return collect(config('project-routables.controllers'))
            ->map(fn (string $controller) => [
                'name' => $controller,
            ])->toArray();
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => Str::of($value)
                ->afterLast('\\')
                ->remove('Controller')
                ->toString(),
        );
    }

    public function route(): MorphOne
    {
        return $this->morphOne(Route::class, 'routable');
    }
}
