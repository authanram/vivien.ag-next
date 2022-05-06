<?php

namespace App\View\Components;

use App\Contracts\MarkdownParserContract as MarkdownParser;
use Exception;
use Illuminate\View\Component;

class Markdown extends Component
{
    public function __construct(protected MarkdownParser $markdownParser, protected array $replace = [])
    {
    }

    public function render(): callable
    {
        return function (array $data) {
            $attributes = $data['attributes']
                ->merge(['class' => 'x-parsedown'])
                ->toHtml();

            $attributes = $attributes !== ''
                ? " $attributes"
                : '';

            return sprintf(
                '<div%s>%s</div>',
                $attributes,
                $this->parse($data['slot']),
            );
        };
    }

    protected function parse(string $subject): string
    {
        try {
            return $this->markdownParser->parseAndReplace(request(), $subject, $this->replace);
        } catch (Exception $exception) {
            abort(505, $exception->getMessage());
        }
    }
}
