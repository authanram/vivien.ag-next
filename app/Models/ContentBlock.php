<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

abstract class ContentBlock extends Model
{
    use SoftDeletes;

    protected $table = 'content_blocks';

    protected $fillable = [
        'name',
        'slug',
        'value',
    ];
}
