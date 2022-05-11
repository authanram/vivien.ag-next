<?php

namespace App\Nova;

use App\Models\Catering as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Catering extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'note',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Caterings');
    }

    public static function singularLabel(): string
    {
        return __('Catering');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:caterings,name')
                ->updateRules('required', 'unique:caterings,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Note'), 'note')
                ->sortable()
                ->showOnPreview(),

            HasMany::make(__('Events'), 'events', Event::class),

        ];
    }
}
