<?php

namespace App\Presenters;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;

/**
 * @property MenuItem $entity
 */
class MenuItemPresenter extends Presenter
{
    public function isActive(): bool
    {
        return request()?->route()?->getName() === $this->route();
    }

    public function href(): string
    {
        return Route::has($this->route())
            ? route($this->route())
            : '#';
    }

    public function colorCode(): ?string
    {
        return $this->entity->color?->color;
    }

    protected function route(): ?string
    {
        return $this->entity->route?->name;
    }
}
