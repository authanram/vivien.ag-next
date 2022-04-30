<?php

namespace App;

use App\Repositories\Events;
use App\Repositories\MenuItems;
use App\Repositories\Menus;

final class Repositories
{
    protected Events $event;

    protected MenuItems $menuItems;

    protected Menus $menu;

    public function events(): Events
    {
        $this->event ??= new Events();

        return $this->event;
    }

    public function menuItems(): MenuItems
    {
        $this->menuItems ??= new MenuItems();

        return $this->menuItems;
    }

    public function menus(): Menus
    {
        $this->menu ??= new Menus();

        return $this->menu;
    }
}
