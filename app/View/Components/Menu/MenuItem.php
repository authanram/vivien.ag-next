<?php

namespace App\View\Components\Menu;

use App\Facades\Site;
use App\Models\MenuItem as Model;
use App\View\Components\Component;
use Illuminate\Contracts\View\View;
use InvalidArgumentException;

/**
 * @property Model $model
 */
abstract class MenuItem extends Component
{
    abstract protected static function classListActive(): array;
    abstract protected static function classListNotActive(): array;

    protected bool $isActive;
    protected string $color;
    protected string $href;

    public function __construct(
        protected Model $model,
        bool $active = null,
        string $color = null,
        string $href = null,
    ) {
        $this->isActive = $active ?? $this->model->isActive() ?? 'false';
        $this->color = $color ?? $this->model->color->color ?? Site::theme()->accent(request());
        $this->href = $href ?? $this->model->href() ?? '#';
    }

    protected function getExtraAttributes(): array
    {
        return [
            'x-init' => "\$nextTick(() => \$refs.root.classList.remove('transition-none'));",
            'x-ref' => 'root',
            'class' => $this->classAttribute(),
            'href' => $this->href,
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
        $merge = $this->isActive
            ? static::classListActive()
            : static::classListNotActive();

        $classList = array_merge(static::classList(), $merge);

        $classListString = implode(' ', $classList);

        return str_replace('COLOR', $this->color, $classListString);
    }
}

