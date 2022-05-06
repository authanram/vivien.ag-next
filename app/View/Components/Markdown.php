<?php

namespace App\View\Components;

use App\Contracts\SiteServiceContract;
use Exception;
use Illuminate\View\Component;

class Markdown extends Component
{
    public function __construct(protected SiteServiceContract $siteService, protected array $replace = [])
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
            return $this->siteService->parsers()::markdownParser()->parse($subject);
        } catch (Exception $exception) {
            abort(505, $exception->getMessage());
        }
    }
}
