<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Layout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'html',
    ];
}
