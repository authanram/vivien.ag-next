<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends \Spatie\Tags\Tag
{
    public $fillable = [
        'name',
        'slug',
        'type',
        'order_column',
    ];

    public $casts = [
        'name' => 'array',
        'slug' => 'array',
    ];

    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = $value;
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function events(): MorphToMany
    {
        return $this->morphedByMany(Event::class, 'taggable');
    }

    public function images(): MorphToMany
    {
        return $this->morphedByMany(Image::class, 'taggable');
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
