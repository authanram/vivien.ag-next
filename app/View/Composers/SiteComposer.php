<?php

namespace App\View\Composers;

use App\Contracts\SiteServiceContract;
use Illuminate\View\View;

class SiteComposer
{
    public function __construct(protected SiteServiceContract $siteService)
    {
    }

    public function compose(View $view): void
    {
        $view->with('site', $this->siteService);
    }
}
