<?php

namespace App\Nova;

use App\Models\Color;
use App\Models\UserSettings as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;

class UserSettings extends Resource
{
    public static string $model = Model::class;

    protected array $colors = [];

    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->colors = Color::all()->sortBy('color')
            ->mapWithKeys(static function (Color $color) {
                return [$color->rgb => $color->color];
            })->toArray();
    }

    public static function label(): string
    {
        return __('User Settings');
    }

    public static function singularLabel(): string
    {
        return __('User Settings');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Select::make(__('Accent Color'), 'data->color')
                ->options($this->colors)
                ->displayUsingLabels(),

            BelongsTo::make(__('User'), 'user', User::class),
        ];
    }
}
