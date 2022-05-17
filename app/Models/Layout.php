<?php

namespace App\Models;

class Layout extends Model
{
    protected $fillable = [
        'name',
        'view_alias',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];
}
