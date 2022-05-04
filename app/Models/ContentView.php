<?php

namespace App\Models;

use App\Presenters\Models\ContentViewPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentView extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'slug',
        'body',
    ];

    protected $with = ['contentBlocks'];

    public function contentBlocks(): BelongsToMany
    {
        return $this->belongsToMany(ContentBlock::class, 'content_view_blocks');
    }
}
