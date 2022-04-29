<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;

class Session extends Resource
{
    public static string $model = \App\Models\Session::class;

    public static $search = [
        'user_id',
    ];

    public static array $searchRelations = [
        'user' => ['name'],
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id', function () {
                return $this->model()?->getAttributes()['id'];
            })->sortable()
            ,
            BelongsTo::make('User', 'user', User::class)
                ->searchable()
                ->sortable()
            ,
            Text::make(__('Ip Address'), 'ip_address')
                ->sortable()
            ,
            Text::make(__('User Agent'), 'user_agent')
                ->onlyOnDetail()
                ->sortable()
            ,
            Text::make(__('Payload'), 'payload')
                ->sortable()
                ->onlyOnDetail()
            ,
            Number::make(__('Last Activity'), 'last_activity')
                ->sortable()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Sessions');
    }

    public static function singularLabel(): string
    {
        return __('Session');
    }
}
