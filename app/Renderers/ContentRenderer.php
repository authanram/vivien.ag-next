<?php

namespace App\Renderers;

use App\Contracts\ContentRendererContract;
use Illuminate\Http\Request;

final class ContentRenderer implements ContentRendererContract
{
    public function render(Request $request, string $subject, array $replace = []): string
    {
        return self::replace($request, $subject, $replace);
    }

    protected static function replace(Request $request, string $subject, array $replace): string
    {
        $replace = array_merge(config('project.content.replace')($request), $replace);

        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}
