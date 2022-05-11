<?php

namespace App\Models;

use App\Presenters\Models\ContentViewPresenter as Presenter;

class ContentView extends ContentBlock
{
    protected $table = 'content_blocks';

    public static string $presenter = Presenter::class;

    public $attributes = [
        'type' => __CLASS__,
    ];
}
