<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Sushi\Sushi;

class Layout extends Model
{
    use Sushi;

    protected $fillable = [
        'name',
        'view_alias',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    public function getRows(): array
    {
        return [
            [
                'name' => 'Blank',
                'view_alias' => 'layouts.blank',
                'sections' => [
                    'body',
                ],
            ],
            [
                'name' => 'Default',
                'view_alias' => 'layouts.default',
                'sections' => [
                    'title',
                    'content',
                ],
            ],
        ];
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
