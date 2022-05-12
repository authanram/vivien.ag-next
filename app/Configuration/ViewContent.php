<?php

namespace App\Configuration;

use Illuminate\Support\Collection;

class ViewContent
{
    public function get(string $key = null): Collection
    {
        $config = config(rtrim('project-view-contents.'.$key, '.'));

        return collect($config);
    }

    public function layouts(string $attribute = 'alias'): Collection
    {
        return $this->get('layouts')->mapWithKeys(fn ($layout, $key) => [$key => $layout[$attribute]]);
    }
}
