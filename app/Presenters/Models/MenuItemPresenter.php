<?php

namespace App\Presenters\Models;

use App\Models\MenuItem;
use App\Presenters\Presenter;

/**
 * @property MenuItem $entity
 */
class MenuItemPresenter extends Presenter
{
    public function href(): string
    {
        return $this->route() ? route($this->route()) : '#';
    }

    public function isActive(): bool
    {
        return request()->route()?->getName() === $this->route();
    }

    public function color(): ?string
    {
        return $this->entity->color?->color;
    }

    public function route(): ?string
    {
        return $this->entity->route?->route;
    }
}