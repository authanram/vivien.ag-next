<?php

namespace App\Parsers;

use App\Contracts\MarkdownParserContract;
use App\Facades\Site;
use App\Markdown\Plugins\Renderables;
use Authanram\Markdown\Converter;
use Illuminate\Http\Request;

final class MarkdownParser implements MarkdownParserContract
{
    public function parse(string $text, Request $request = null): string
    {
        $request ??= request();

        $searchAndReplace = array_merge(
            config('project.content.replace')($request),
            config('project.markdown.replace')($request),
        );

        $text = (new Converter([
            'base_url' => config('app.url'),
            'plugins' => [
                Renderables::class,
            ],
        ]))->withMarkdown($text)->toHtml();

        $text = Site::renderers()::contentRenderer()
            ->render($request, $text);

        return str_replace(
            array_keys($searchAndReplace),
            array_values($searchAndReplace),
            $text,
        );
    }
}
