<?php

namespace App\Models;

use App\Contracts\Routable;
use App\Presenters\PagePresenter as Presenter;
use App\Routables\PageRoutable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Routable
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    public function routable(): PageRoutable
    {
        return new PageRoutable($this);
    }

    public function layout(): BelongsTo
    {
        return $this->belongsTo(Layout::class);
    }

    public function staticBlocks(): BelongsToMany
    {
        return $this->belongsToMany(
            StaticBlock::class,
            'page_static_blocks',
            'page_id',
            'static_block_id',
        )->withPivot('section')
            ->withTimestamps();
    }
}
