<?php

namespace App\View\Components;

use App\Models\ContentBlock as Model;
use Illuminate\View\Component;

class ContentBlock extends Component
{
    public ?string $html = null;

    public function __construct(Model $model)
    {
        $this->html = $model->body;
    }

    public function render(): string
    {
        return (fn (array $data) => $this->html)($this->data());
    }
}
