<?php

namespace App;

use App\Repositories\Contents;
use App\Repositories\Events;
use App\Repositories\EventTemplates;
use App\Repositories\MenuItems;
use App\Repositories\Menus;
use Illuminate\Database\Eloquent\Builder;

final class Repositories
{
    protected Contents $contents;
    protected Events $event;
    protected EventTemplates $eventTemplates;
    protected MenuItems $menuItems;
    protected Menus $menu;

    public function contents(Builder $builder = null): Contents
    {
        $this->contents ??= new Contents();

        if ($builder) {
            $this->contents->setBuilder($builder);
        }

        return $this->contents;
    }

    public function events(Builder $builder = null): Events
    {
        $this->event ??= new Events();

        if ($builder) {
            $this->event->setBuilder($builder);
        }

        return $this->event;
    }

    public function eventsTemplates(Builder $builder = null): EventTemplates
    {
        $this->eventTemplates ??= new EventTemplates();

        if ($builder) {
            $this->eventTemplates->setBuilder($builder);
        }

        return $this->eventTemplates;
    }

    public function menuItems(Builder $builder = null): MenuItems
    {
        $this->menuItems ??= new MenuItems();

        if ($builder) {
            $this->menuItems->setBuilder($builder);
        }

        return $this->menuItems;
    }

    public function menus(Builder $builder = null): Menus
    {
        $this->menu ??= new Menus();

        if ($builder) {
            $this->menu->setBuilder($builder);
        }

        return $this->menu;
    }
}
