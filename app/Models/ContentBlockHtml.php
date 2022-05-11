<?php

namespace App\Models;

use App\Presenters\Models\ContentBlockHtmlPresenter as Presenter;

class ContentBlockHtml extends ContentBlock
{
    public static string $presenter = Presenter::class;
}
