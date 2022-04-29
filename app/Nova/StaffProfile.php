<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
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
            ,
            Text::make(__('Name'), 'name')
                ->required()
            ,
            Text::make(__('Occupation'), 'occupation')
            ,
            Text::make(__('ImageUrl'), 'image_url')
            ,
            BelongsToMany::make(__('Events'), 'events', Event::class)
                ->hideFromIndex()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Staff Profiles');
    }

    public static function singularLabel(): string
    {
        return __('Staff Profile');
    }
}
