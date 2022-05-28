<?php

namespace App\Nova;

use App\Models\Staff as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;

class Staff extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'occupation',
    ];

    public static function label(): string
    {
        return __('Staff');
    }

    public static function singularLabel(): string
    {
        return __('Staff');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Occupation'), 'occupation')
                ->sortable()
                ->showOnPreview(),

            Image::make(__('Image'), 'image')
                ->disk('public')
                ->path('staff')
                ->sortable()
                ->showOnPreview(),

            DateTime::make(__('Disabled At'), 'disabled_at')
                ->onlyOnForms()
                ->showOnPreview(),

            Line::make(__('Disabled At'), fn () => $this->resource->disabledAt())
                ->extraClasses('text-sm')
                ->showOnPreview(),

            BelongsToMany::make(__('Events'), 'events', Event::class),
        ];
    }
}
