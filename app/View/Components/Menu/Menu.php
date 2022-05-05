<?php

namespace App\View\Components\Menu;

use App\Contracts\SiteServiceContract;
use App\View\Components\Component;
use Illuminate\Support\Collection;

final class Menu extends Component
{
    protected static string $alias = 'components.menu.menu';

    public Collection $items;
    public string $itemComponent;

    public function __construct(protected SiteServiceContract $siteService, string $type = 'main')
    {
        $this->items = collect(); //$this->siteService->menus()->{$type}();
        $this->itemComponent = "$type:menu-item";
    }
}
