<?php

namespace App\Models;

use App\Presenters\PagePresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
    ];

    public function layout(): BelongsTo
    {
        return $this->belongsTo(Layout::class);
    }

    public function pageSections(): HasMany
    {
        return $this->hasMany(PageSection::class);
    }

    public function staticBlocks(): BelongsToMany
    {
        return $this->belongsToMany(
            StaticBlock::class,
            'page_static_blocks',
            'page_id',
            'static_block_id',
        )->withPivot('slug')
            ->withTimestamps();
    }
}
