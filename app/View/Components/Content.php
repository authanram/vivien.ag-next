<?php

namespace App\View\Components;

use App\Contracts\SiteServiceContract;
use Illuminate\View\Component;

class Content extends Component
{
    public ?string $html = null;

    public function __construct(SiteServiceContract $siteService, string $slug)
    {
        $this->html = $siteService->renderers()::contentRenderer()
            ->render(request(), $siteService->content($slug));
    }

    public function render(): callable
    {
        return fn (array $data) => $this->html;
    }
}
