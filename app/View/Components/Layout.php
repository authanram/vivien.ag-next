<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public function __construct(protected array $slots, protected string $html)
    {
    }

    public function render(): callable
    {
        $this->html = str_replace(
            array_map(static fn (string $slot) => "%slot:$slot%", array_keys($this->slots)),
            array_values($this->slots),
            $this->html,
        );

        return fn () => $this->html;
    }
}
