<?php

namespace Acme\DuplicateField;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Field;

class Duplicate extends Field
{
    public $component = 'duplicate-field';

    public function __construct()
    {
        parent::__construct(null, null, null);

        $this->onlyOnIndex();
    }

    public function withMeta(array $meta): static
    {
        parent::withMeta($meta);

        $this->meta['resourceDisplay'] = Str::of($this->meta['resource'])->singular()->title();

        return $this;
    }
}
