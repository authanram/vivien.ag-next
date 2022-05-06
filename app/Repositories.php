<?php

namespace App;

use App\Repositories\Contents;
use App\Repositories\Events;
use App\Repositories\EventTemplates;
use App\Repositories\MenuItems;
use App\Repositories\Menus;
use App\Repositories\Repository;
use App\Repositories\Routes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class Repositories
{
    protected Collection $repositories;

    public function __construct()
    {
        $this->repositories = collect([
            Contents::class => new Contents(),
            Events::class => new Events(),
            EventTemplates::class => new EventTemplates(),
            MenuItems::class => new MenuItems(),
            Menus::class => new Menus(),
            Routes::class => new Routes(),
        ]);
    }

    public function all(): Collection
    {
        return $this->repositories;
    }

    public function contents(Builder $builder = null): Repository|Contents
    {
        $repository = $this->repositories->get(Contents::class);

        return $builder ? $repository->setBuilder($builder) : $repository;
    }

    public function events(Builder $builder = null): Repository|Events
    {
        $repository = $this->repositories->get(Events::class);

        return $builder ? $repository->setBuilder($builder) : $repository;
    }

    public function eventsTemplates(Builder $builder = null): Repository|EventTemplates
    {
        $repository = $this->repositories->get(EventTemplates::class);

        return $builder ? $repository->setBuilder($builder) : $repository;
    }

    public function menuItems(Builder $builder = null): Repository|MenuItems
    {
        $repository = $this->repositories->get(MenuItems::class);

        return $builder ? $repository->setBuilder($builder) : $repository;
    }

    public function menus(Builder $builder = null): Repository|Menus
    {
        $repository = $this->repositories->get(Menus::class);

        return $builder ? $repository->setBuilder($builder) : $repository;
    }

    public function routes(Builder $builder = null): Repository|Routes
    {
        $repository = $this->repositories->get(Routes::class);

        return $builder ? $repository->setBuilder($builder) : $repository;
    }
}
