<?php

namespace App\Nova;

use App\Models\ContentLayoutSection;
use App\Models\ContentView;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Panel;

class ContentLayoutSectionFieldsCreator
{
    public static function make(ContentView $contentView): array
    {
        return $contentView->load('contentLayoutSections')->contentLayoutSections
            ->map(static fn ($section) => Panel::make(
                Str::of($section->name)->title(),
                [self::makeField($section)]
            ))->toArray();
    }

    public static function makeFieldSelection(string $value): Select
    {
        $options = collect(self::fields())
            ->keys()
            ->mapWithKeys(fn (string $key) => [$key => Str::of($key)->title()->toString()])
            ->toArray();

        return Select::make(__('Field'), 'field')
            ->options($options)
            ->displayUsingLabels()
            ->rules('required');
    }

    private static function makeField(ContentLayoutSection $section): Field
    {
        return self::fields()[$section->pivot->field](
            Str::of($section->name)->title()->toString(),
            $section->name,
            $section->pivot->value,
        );
    }

    private static function fields(): array
    {
        return [
            'html' => fn ($name, $attribute, $value) => Code::make(__($name), $attribute, fn () => $value ?? '%blocks%')
                ->language('htmlmixed')
                ->autoHeight()
                ->rules('required'),

            'markdown' => fn ($name, $attribute, $value) => Markdown::make(__($name), $attribute, fn () => $value ?? '')
                ->rules('required')
                ->alwaysShow()
        ];
    }
}
