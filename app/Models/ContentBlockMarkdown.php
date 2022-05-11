<?php

namespace App\Models;

use App\Presenters\Models\ContentBlockMarkdownPresenter as Presenter;

class ContentBlockMarkdown extends ContentBlock
{
    public static string $presenter = Presenter::class;
}
