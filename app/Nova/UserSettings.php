<?php

namespace App\Nova;

use App\Models\UserSettings as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class UserSettings extends Resource
{
    public static string $model = Model::class;

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

            Code::make(__('Data'), 'data', fn ($value) => $value ?? '{}')
                ->rules('required', 'json')
                ->json()
                ->showOnPreview(),
        ];
    }
}
