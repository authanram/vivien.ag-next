<?php

namespace App;

use App\Repositories\Menus as Repository;
use App\View\Components\Menu\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class Menus
{
    public function __construct(protected Request $request, protected Repository $repository)
    {
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function footer(): Collection
    {
        return $this->repository->footer();
    }

    /**
     * @return Collection|MenuItem[]
     * @noinspection PhpDocSignatureInspection
     */
    public function main(): Collection
    {
        return $this->repository->main();
    }
}
