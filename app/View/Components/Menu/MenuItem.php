<?php

namespace App\View\Components\Menu;

use App\Models\MenuItem as Model;
use App\Presenters\Models\MenuItemPresenter;
use App\View\Components\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Optional;
use InvalidArgumentException;

/**
 * @property Model $model
 */
abstract class MenuItem extends Component
{
    abstract protected static function classListActive(): array;
    abstract protected static function classListNotActive(): array;

    protected function getExtraAttributes(): array
    {
        return [
            'x-init' => "\$nextTick(() => \$refs.root.classList.remove('transition-none'));",
            'x-ref' => 'root',
            'class' => $this->classAttribute(),
            'href' => $this->presenter()->href() ?? '#',
        ];
    }

    public function text(): string
    {
        return $this->model->label;
    }

    public function render(): View
    {
        if (static::$alias === '') {
            throw new InvalidArgumentException(static::class.'::$view must not be empty.');
        }

        return view(static::$alias);
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

