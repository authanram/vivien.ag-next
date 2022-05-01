<?php

namespace App\Renderers;

use App\Contracts\ContentRendererContract;

final class ContentRenderer implements ContentRendererContract
{
    public function render(string $subject, array $replace = []): string
    {
        return self::replace($subject, $replace);
    }

    protected static function replace(string $subject, array $replace): string
    {
        $replace = array_merge(config('project.content.replace')(), $replace);

        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}
