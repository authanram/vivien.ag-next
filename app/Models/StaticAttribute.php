<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class StaticAttribute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'value',
        'data',
        'locked',
    ];

    protected $attributes = [
        'data' => '{}',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
