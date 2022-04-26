<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class IconRenderer extends Component
{
    public ?string $html = null;

    public function __construct(
        public string $icon,
        public string $rawPath = '/vendor/icons/',
    ) {
        if (str_starts_with($icon, 'http:')) {
            return;
        }

        $this->html = Cache::get('icon.'.$icon);

        if (is_null($this->html) === false) {
            return;
        }

        $this->html = $this->html($icon);

        Cache::put('icon.'.$icon, $this->html);
    }

    public function render(): callable
    {
        return function (array $data) {
            return str_replace('%s', $data['attributes']->toHtml(), $this->html);
        };
    }

    protected function html(string $icon): string
    {
        $html = File::get(public_path($this->rawPath.$icon.'.svg'));

        return str_replace('<svg', '<svg %s',$html);
    }
}
