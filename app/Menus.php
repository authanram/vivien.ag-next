<?php

namespace App;

use App\Repositories\Menus as Repository;
use App\View\Components\Menu\ItemMain;
use App\View\Components\Menu\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class Menus
{
    public function __construct(protected Request $request, protected Repository $menus)
    {
    }

    /**
     * @return Collection|ItemMain[]
     * @noinspection PhpDocSignatureInspection
     */
    public function footer(): Collection
    {
        return $this->menus->footer()
            ->mapInto(ItemMain::class)
            ->map(fn (ItemMain $component) => $component->setRequest($this->request));
    }

    /**
     * @return Collection|ItemMain[]
     * @noinspection PhpDocSignatureInspection
     */
    public function main(): Collection
    {
        return $this->menus->main()
            ->mapInto(ItemMain::class)
            ->map(fn (MenuItem $component) => $component->setRequest($this->request));
    }
}
