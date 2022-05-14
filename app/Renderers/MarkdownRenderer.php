<?php

namespace App\Renderers;

use App\Contracts\MarkdownRenderer as Contract;
use App\Markdown\Plugins\Renderables;
use Authanram\Markdown\Converter;
use Illuminate\Http\Request;

final class MarkdownRenderer implements Contract
{
    public function render(mixed $value = null, Request $request = null): string
    {
        $request ??= request();

        $searchAndReplace = array_merge(
            config('project.content.replace')($request),
            config('project.markdown.replace')($request),
        );

        $parameters = [
            'base_url' => config('app.url'),
            'plugins' => [
                Renderables::class,
            ],
        ];

        $text = (new Converter($parameters))
            ->withMarkdown($value)
            ->toHtml();

        return str_replace(
            array_keys($searchAndReplace),
            array_values($searchAndReplace),
            $text,
        );
    }
}
