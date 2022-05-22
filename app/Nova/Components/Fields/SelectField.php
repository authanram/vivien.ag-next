<?php

namespace App\Nova\Components\Fields;

use Illuminate\Support\Collection;
use Laravel\Nova\Fields\Select;

final class SelectField
{
    protected array $options = [];
    protected Select|null $field = null;

    private function __construct()
    {
    }

    public static function make(string $name, string $attribute): self
    {
        $instance = new self();

        $instance->field = Select::make($name, $attribute)
            ->options($instance->options)
            ->displayUsingLabels()
            ->sortable()
            ->showOnPreview();

        return $instance;
    }

    public function options(Collection $collection, string $columnKey, string $columnValue): self
    {
        $this->field->options(
            $collection
                ->mapWithKeys(fn ($item) => [$item->{$columnKey} => $item->{$columnValue}])
                ->toArray(),
        );

        return $this;
    }

    public function __toArray(): array
    {
        return [$this->field];
    }
}
