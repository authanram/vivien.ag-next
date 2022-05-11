<?php

declare(strict_types=1);

namespace App\Markdown\Plugins\RenderableComponents;

use App\Contracts\RenderableComponent;
use App\Models\ContentBlock as Model;
use App\View\Components\ContentBlock as Component;

class ContentBlock implements RenderableComponent
{
    public static function render(mixed $value): string|null
    {
        $model = Model::firstWhere('slug', $value);

        if (is_null($model)) {
            return null;
        }

        return (new Component($model))->render();
    }
}
