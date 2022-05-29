<?php

namespace App\Nova;

use App\Models\UserSettings as Model;
use App\Nova;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Color as ColorField;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class UserSettings extends Resource
{
    public static string $model = Model::class;

    public static $with = [
        'color:id,color',
        'user:id,name',
    ];

    public static $title = 'user.name';

    public static function label(): string
    {
        return __('User Settings');
    }

    public static function singularLabel(): string
    {
        return __('User Settings');
    }

    public function fields(NovaRequest $request): array
    {
        $fields = [
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
        ];

        if ($request->isResourceDetailRequest()) {
            $fields[] = ColorField::make(__('Accent Color'), 'color', static function ($value) {
                return is_null($value?->hex)
                    ? \App\Color::rgbToHex(Nova::$brandColorDefaultRgb)
                    : $value?->hex;
            })->exceptOnForms()->showOnPreview();
        }

        return $fields;
    }
}
