<?php

namespace App\View\Components;

use App\Contracts\SiteService;
use Illuminate\View\Component;

class Markdown extends Component
{
    public function __construct(protected SiteService $site, protected array $replace = [])
    {
    }

    public function render(): callable
    {
        return static function (array $data) {
            $attributes = $data['attributes']
                ->merge(['class' => 'x-parsedown'])
                ->toHtml();

            $attributes = $attributes !== ''
                ? " $attributes"
                : '';

            return sprintf(
                '<div%s>%s</div>',
                $attributes,
                'quux',
                //$this->site->renderers()::markdown()->render($data['slot']),
            );
        };
    }
}
