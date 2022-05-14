<?php

namespace App\Models;

use App\Presenters\StaticBlockPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticBlock extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'slug',
        'value',
    ];

    public function pages(): BelongsToMany
    {
        return $this->belongsToMany(
            Page::class,
            'page_static_blocks',
            'static_block_id',
            'page_id',
        )->withPivot('section')
            ->withTimestamps();
    }
}
