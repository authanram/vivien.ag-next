<?php

namespace App\Models;

use App\Presenters\Models\ContentViewPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public $attributes = [
        'content_view_id' => 1,
    ];

    protected $with = ['contentBlocks'];

    public function contentView(): BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }

    public function contentBlocks(): BelongsToMany
    {
        return $this->belongsToMany(ContentBlock::class, 'content_view_blocks')
            ->withPivot('slug', 'order_column', 'published');
    }
}
