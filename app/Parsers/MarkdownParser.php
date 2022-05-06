<?php

namespace App\Parsers;

use App\Contracts\MarkdownParserContract;
use Illuminate\Http\Request;
use Parsedown;

final class MarkdownParser extends Parsedown implements MarkdownParserContract
{
    protected static function replace(Request $request, string $subject, array $replace): string
    {
        $replace = array_merge(config('project.markdown.replace')($request), $replace);

        return str_replace(array_keys($replace), array_values($replace), $subject);
    }

    public function __construct()
    {
        $this->InlineTypes['{'][] = 'Span';
        $this->InlineTypes['{'][] = 'ColoredText';
        $this->inlineMarkerList .= '{';
    }

    public function parseAndReplace(Request $request, string $text, array $replace = []): string
    {
        $text = $this->parse($text);

        return self::replace($request, $text, $replace);
    }

    public function inlineSpan(array $excerpt): ?array
    {
        return preg_match('/^{span (.*?)}(.*?){\/span}/', $excerpt['text'], $matches) ? [
            'extent' => strlen($matches[0]),
            'element' => [
                'name' => 'span',
                'text' => $matches[2],
                'attributes' => ['class' => $matches[1]],
            ],
        ] : null;
    }

    public function inlineColoredText(array $excerpt): ?array
    {
        return preg_match('/^{c:([#\w]\w+)}(.*?){\/c}/', $excerpt['text'], $matches) ? [
            'extent' => strlen($matches[0]),
            'element' => [
                'name' => 'span',
                'text' => $matches[2],
                'attributes' => ['style' => 'color:' . $matches[1]],
            ],
        ] : null;
    }
}
