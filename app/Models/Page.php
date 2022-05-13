<?php

namespace App\Models;

use App\Contracts\Renderable;
use App\Contracts\Renderer;
use App\Presenters\Models\PagePresenter as Presenter;
use App\Renderers\PageRenderer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Renderable
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

    public static function renderer(): Renderer|string
    {
        return PageRenderer::class;
    }

    public function staticBlocks(): BelongsToMany
    {
        return $this->belongsToMany(
            StaticBlock::class,
            'page_static_blocks',
            'page_id',
            'static_block_id',
        )->withPivot(['section']);
    }

    public function layout(): BelongsTo
    {
        return $this->belongsTo(Layout::class);
    }
}
