<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $table = 'staffs';

    protected $fillable = [
        'uuid',
        'name',
        'occupation',
        'image_url',
    ];

    final public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
