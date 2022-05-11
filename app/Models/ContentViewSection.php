<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ContentViewSection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
    ];
}
