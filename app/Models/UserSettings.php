<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSettings extends Model
{
    protected $fillable = [
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public $attributes = [
        'data' => '{"accent": "pink"}',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
