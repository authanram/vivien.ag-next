<?php

namespace App\Renderers;

use App\Contracts\Renderer;
use App\Facades\Site;
use App\Markdown\Plugins\Renderables;
use Authanram\Markdown\Converter;
use Illuminate\Http\Request;

final class MarkdownRenderer implements Renderer
{
    public function __construct(protected string $value)
    {
    }

    public function render(Request $request = null): string
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
        ]))->withMarkdown($this->value)->toHtml();

        $text = Site::renderers()::contentRenderer()
            ->render($request, $text);

        return str_replace(
            array_keys($searchAndReplace),
            array_values($searchAndReplace),
            $text,
        );
    }
}
