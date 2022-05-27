<?php

namespace App;

use App\Repositories\Colors;
use App\Repositories\Events;
use App\Repositories\EventTemplates;
use App\Repositories\ImageCoordinates;
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
        $this->repositories = collect();
    }

    public function colors(Builder $builder = null): Repository|Colors
    {
        return $this->withBuilder(Colors::class, $builder);
    }

    public function events(Builder $builder = null): Repository|Events
    {
        return $this->withBuilder(Events::class, $builder);
    }

    public function eventsTemplates(Builder $builder = null): Repository|EventTemplates
    {
        return $this->withBuilder(EventTemplates::class, $builder);
    }

    public function imageCoordinates(Builder $builder = null): Repository|ImageCoordinates
    {
        return $this->withBuilder(ImageCoordinates::class, $builder);
    }

    public function menuItems(Builder $builder = null): Repository|MenuItems
    {
        return $this->withBuilder(MenuItems::class, $builder);
    }

    public function menus(Builder $builder = null): Repository|Menus
    {
        return $this->withBuilder(Menus::class, $builder);
    }

    public function routes(Builder $builder = null): Repository|Routes
    {
        return $this->withBuilder(Routes::class, $builder);
    }

    protected function withBuilder(Repository|string $repository, ?Builder $builder): Repository
    {
        $instance = $this->repositories->get($repository);

        if (is_null($instance) === false) {
            return $builder ? $instance->setBuilder($builder) : $instance;
        }

        $this->repositories->put($repository, new $repository());

        return $this->withBuilder($repository, $builder);
    }
}
