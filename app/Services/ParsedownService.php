<?php

namespace App\Services;

use Parsedown;

class ParsedownService extends Parsedown
{
    final public function __construct()
    {
        $this->InlineTypes['{'][] = 'Span';

        $this->InlineTypes['{'][] = 'ColoredText';

        $this->inlineMarkerList .= '{';
    }

    final public function inlineSpan(array $excerpt): ?array
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

    final public function inlineColoredText(array $excerpt): ?array
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
