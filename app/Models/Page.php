<?php

namespace App\Models;

use App\Contracts\Routable;
use App\Presenters\PagePresenter as Presenter;
use App\Routables\PageRoutable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Routable
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

    public function routable(): PageRoutable
    {
        return new PageRoutable($this);
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
