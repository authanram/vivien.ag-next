<?php

namespace App\PresentersNew;

use App\Models\MenuItem;

/**
 * @method MenuItem resolve()
 */
class MenuItemPresenter extends BasePresenter
{
    public function labelUppercase(string $suffix = ''): string
    {
        return strtoupper($this->resolve()->label) . $suffix;
    }
}
