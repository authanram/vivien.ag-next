<?php

namespace App;

use App\Repositories\Contents;
use App\Repositories\Events;
use App\Repositories\EventTemplates;
use App\Repositories\MenuItems;
use App\Repositories\Menus;

final class Repositories
{
    protected Contents $contents;
    protected Events $event;
    protected EventTemplates $eventTemplates;
    protected MenuItems $menuItems;
    protected Menus $menu;

    public function contents(): Contents
    {
        $this->contents ??= new Contents();

        return $this->contents;
    }

    public function events(): Events
    {
        $this->event ??= new Events();

        return $this->event;
    }

    public function eventsTemplates(): EventTemplates
    {
        $this->eventTemplates ??= new EventTemplates();

        return $this->eventTemplates;
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
