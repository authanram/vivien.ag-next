<?php

namespace App;

use App\Repositories\Colors;
use App\Repositories\ContentBlocks;
use App\Repositories\ContentComponents;
use App\Repositories\EventTemplates;
use App\Repositories\Events;
use App\Repositories\ImageCoords;
use App\Repositories\MenuItems;
use App\Repositories\Menus;
use App\Repositories\Repository;
use App\Repositories\Routes;
use App\Repositories\StaticAttributes;
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

    public function contentBlocks(Builder $builder = null): Repository|ContentBlocks
    {
        return $this->withBuilder(ContentBlocks::class, $builder);
    }

    public function contentComponents(Builder $builder = null): Repository|ContentComponents
    {
        return $this->withBuilder(ContentComponents::class, $builder);
    }

    public function events(Builder $builder = null): Repository|Events
    {
        return $this->withBuilder(Events::class, $builder);
    }

    public function eventsTemplates(Builder $builder = null): Repository|EventTemplates
    {
        return $this->withBuilder(EventTemplates::class, $builder);
    }

    public function imageCoords(Builder $builder = null): Repository|ImageCoords
    {
        return $this->withBuilder(ImageCoords::class, $builder);
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

    public function staticAttributes(Builder $builder = null): Repository|StaticAttributes
    {
        return $this->withBuilder(StaticAttributes::class, $builder);
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
