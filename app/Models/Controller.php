<?php

namespace App\Models;

use App\Contracts\Routable;
use App\Routables\ControllerRoutable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use Sushi\Sushi;

class Controller extends Model implements Routable
{
    use Sushi;

    public $appends = [
        'actions',
    ];

    /**
     * @throws ReflectionException
     */
    public static function controllerActions(string $classname): array
    {
        return collect((new ReflectionClass($classname))->getMethods())
            ->filter(static fn (ReflectionMethod $method) => $method->isPublic())
            ->filter(static fn (ReflectionMethod $method) => $method->class === $classname)
            ->map(static fn (ReflectionMethod $method) => $method->getName())
            ->toArray();
    }

    public function routable(): ControllerRoutable
    {
        return new ControllerRoutable($this);
    }

    public function getRows(): array
    {
        return collect(config('project-routables.controllers'))
            ->map(fn (string $controller) => [
                'name' => $controller,
            ])->toArray();
    }

    public function actions(): Attribute
    {
        return Attribute::make(
            get: fn () => self::controllerActions($this->attributes['name']),
        );
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
