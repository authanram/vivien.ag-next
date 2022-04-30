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
    protected static string $alias = '';

    abstract protected static function classList(): array;
    abstract protected static function classListActive(): array;
    abstract protected static function classListNotActive(): array;

    public function __construct(public Model $model)
    {
    }

    public function href(): string
    {
        return $this->presenter()->href() ?? '#';
    }

    public function text(): string
    {
        return $this->model->label;
    }

    public function classAttribute(): string
    {
        $merge = $this->presenter()->isActive()
            ? static::classListActive()
            : static::classListNotActive();

        $classList = array_merge(static::classList(), $merge);

        $classListString = implode(' ', $classList);

        return str_replace('COLOR', $this->presenter()->color(), $classListString);
    }

    public function render(): View
    {
        if (static::$alias === '') {
            throw new InvalidArgumentException(static::class.'::$view must not be empty.');
        }

        return view(static::$alias);
    }

    protected function presenter(): Optional|MenuItemPresenter
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->model->present();
    }
}

