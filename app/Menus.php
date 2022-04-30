<?php

namespace App;

use App\Repositories\Menus as Repository;
use App\View\Components\Menu\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class Menus
{
    public function __construct(protected Request $request, protected Repository $menus)
    {
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function footer(): Collection
    {
        return $this->menus->footer();
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function main(): Collection
    {
        return $this->menus->main();
    }
}
