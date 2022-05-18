<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class StaticAttribute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
