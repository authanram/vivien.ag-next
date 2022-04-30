<?php

namespace App\View\Components\Menu;

use App\Models\MenuItem as Model;
use App\Presenters\Models\MenuItemPresenter;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Optional;
use Illuminate\View\Component;
use InvalidArgumentException;

abstract class MenuItem extends Component
{
    protected static string $view;

    abstract protected static function classList(): array;
    abstract protected static function classListActive(): array;
    abstract protected static function classListNotActive(): array;

    protected static function view(): ?string
    {
        return static::$view ?? null;
    }

    public function __construct(public Model $model)
    {
        $this->attributes = $this->newAttributeBag();
    }

    public function href(): string
    {
        return $this->presenter()->href() ?? '#';
    }

    public function text(): string
    {
        return $this->model->label;
    }

    public function render(): View
    {
        if (is_null(static::view())) {
            throw new InvalidArgumentException(static::class.'::$view must not be empty.');
        }

        $this->attributes->merge(['class' => $this->classAttribute()]);

        return view(static::view());
    }

    protected function classAttribute(): string
    {
        $merge = $this->presenter()->isActive()
            ? static::classListActive()
            : static::classListNotActive();

        $classList = array_merge(static::classList(), $merge);

        $classListString = implode(' ', $classList);

        return str_replace('COLOR', $this->presenter()->color(), $classListString);
    }

    protected function presenter(): Optional|MenuItemPresenter
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->model->present();
    }
}

