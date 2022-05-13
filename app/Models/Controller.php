<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Sushi\Sushi;

class Controller extends Model
{
    use Sushi;

    public bool $readonly = true;

    public function getRows(): array
    {
        return collect(config('project-routables.controllers'))
            ->map(fn (string $controller) => [
                'name' => $controller,
            ])->toArray();
    }

    public function route(): MorphOne
    {
        return $this->morphOne(Route::class, 'routable');
    }
}
