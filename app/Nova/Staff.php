<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Staff extends Resource
{
    protected static array $orderBy = ['name' => 'asc'];

    public static string $model = \App\Models\Staff::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'occupation',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Text::make(__('Name'), 'name')
                ->required()
            ,
            Text::make(__('Occupation'), 'occupation')
            ,
            Text::make(__('ImageUrl'), 'image_url')
            ,
        ];
    }

    public static function label(): string
    {
        return __('Staffs');
    }

    public static function singularLabel(): string
    {
        return __('Staff');
    }
}
