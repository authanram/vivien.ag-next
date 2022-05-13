<?php

namespace App\Models;

use App\Http\Controllers\EventsController;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Sushi\Sushi;

class Controller extends Model
{
    use Sushi;

    public bool $readonly = true;

    protected array $rows = [
        [
            'name' => EventsController::class,
        ]
    ];

    public function route(): MorphOne
    {
        return $this->morphOne(Route::class, 'routable');
    }
}
