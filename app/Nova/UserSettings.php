<?php

namespace App\Nova;

use App\Models\UserSettings as Model;
use App\Nova;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Color as ColorField;
use Laravel\Nova\Fields\ID;

class UserSettings extends Resource
{
    public static string $model = Model::class;

    public static $with = ['color', 'user'];

    public static function label(): string
    {
        return __('User Settings');
    }

    public static function singularLabel(): string
    {
        return __('User Settings');
    }

    public function title(): string
    {
        return $this->resource->user->name;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('User'), 'user', User::class)
                ->exceptOnForms()
                ->showOnPreview(),

            BelongsTo::make(__('Accent Color'), 'color', Color::class)
                ->withoutTrashed()
                ->rules('required')
                ->showOnPreview(),

            ColorField::make(__('Accent Color'), 'color', static function ($value) {
                ray($value?->hex);
                return is_null($value?->hex)
                    ? \App\Color::rgbToHex(Nova::$brandColorDefaultRgb)
                    : $value?->hex;
            })->exceptOnForms()->showOnPreview(),
        ];
    }
}
