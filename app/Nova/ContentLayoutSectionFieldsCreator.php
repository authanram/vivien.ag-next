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
            ->map(static fn (ContentLayoutSection $section) => self::makeSection($section))
            ->toArray();
    }

    //$section->pivot->field
    public static function makeFieldSelection(string $name, string $attribute, ?string $value): Select
    {
        $options = collect(self::availableFields($name, $attribute))
            ->mapWithKeys(fn (Field $field, string $key) => [
                $key => Str::of($key)->title()->toString(),
            ])->toArray();

        return Select::make(__('Field'), 'field', fn () => $value)
            ->options($options)
            ->displayUsingLabels()
            ->rules('required');
    }

    private static function makeSection(ContentLayoutSection $section): array
    {
        $attribute = $section->name;

        return [
            Panel::make(Str::of($attribute)->title()->toString(), [
            ]),
        ];
    }

    private static function availableFields(string $name, string $attribute): array
    {
        return [
            'html' => Code::make(__($name), $attribute, fn ($value) => $value ?? '%blocks%')
                ->language('htmlmixed')
                ->autoHeight()
                ->rules('required'),

            'markdown' => Markdown::make(__($name), $attribute)
                ->rules('required')
                ->alwaysShow()
        ];
    }
}
