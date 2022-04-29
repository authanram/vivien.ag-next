<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Attachment extends Model
{
    use HasTags;
    use SoftDeletes;

    protected $fillable = [
        'file',
    ];
}
