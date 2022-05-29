<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteAction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'controller',
        'action',
    ];

    public function route(): MorphOne
    {
        return $this->morphOne(Route::class, 'routable');
    }
}
