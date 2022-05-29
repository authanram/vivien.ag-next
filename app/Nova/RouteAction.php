<?php

namespace App\Nova;

use App\Models\RouteAction as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\ID;

class RouteAction extends Resource
{
    use HasFieldsRoutable;

    public static string $model = Model::class;

    public static $search = [
        'controller',
        'action',
    ];

    public function title(): ?string
    {
        if (is_null($this->resource)) {
            return null;
        }

        return Str::of(class_basename($this->resource->getAttribute('controller')))
            ->append('@')
            ->append($this->resource->getAttribute('action'))
            ->toString();
    }

    public static function label(): string
    {
        return __('Actions');
    }

    public static function singularLabel(): string
    {
        return __('Action');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            ...self::fieldsRoutable(),
        ];
    }
}
