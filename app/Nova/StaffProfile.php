<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;

class StaffProfile extends Resource
{
    public static string $model = \App\Models\StaffProfile::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'occupation',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->required()
                ->showOnPreview()
            ,
            Text::make(__('Occupation'), 'occupation')
                ->showOnPreview()
            ,
            Text::make(__('ImageUrl'), 'image_url')
                ->showOnPreview()
            ,
            DateTime::make(__('Disabled At'), 'disabled_at')
                ->onlyOnForms()
                ->showOnPreview()
            ,
            Line::make(__('Disabled At'), fn () => $this->resource->present()->disabledAt())
                ->showOnPreview()
            ,
            BelongsToMany::make(__('Events'), 'events', Event::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Staff');
    }

    public static function singularLabel(): string
    {
        return __('Staff');
    }
}
