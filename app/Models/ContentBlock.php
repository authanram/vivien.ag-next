<?php

namespace App\Models;

use App\Presenters\Models\ContentBlockPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentBlock extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $table = 'content_blocks';

    protected $fillable = [
        'name',
        'slug',
        'value',
    ];

    public function contentViews(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentView::class,
            'content_view_blocks',
            'content_view_id',
            'content_block_id',
        );
    }
}
