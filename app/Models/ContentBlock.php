<?php

namespace App\Models;

use App\Presenters\Models\ContentBlockPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentBlock extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'body',
    ];

    public function titleContentBlock(): HasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'title_content_block_id');
    }

    public function contentViews(): BelongsToMany
    {
        return $this->belongsToMany(ContentView::class, 'content_view_blocks');
    }
}
