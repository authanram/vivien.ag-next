<?php

namespace App\Nova;

use App\Models\Session as Model;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;

class Session extends Resource
{
    public static string $model = Model::class;

    public static $search = [
        'user_id',
    ];

    public static function label(): string
    {
        return __('Sessions');
    }

    public static function singularLabel(): string
    {
        return __('Session');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id', function () {
                return $this->model()?->getAttributes()['id'];
            })->sortable()->showOnPreview(),

            BelongsTo::make('User', 'user', User::class)
                ->withoutTrashed()
                ->searchable()
                ->sortable(),

            Text::make(__('Ip Address'), 'ip_address')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('User Agent'), 'user_agent')
                ->onlyOnDetail()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Payload'), 'payload')
                ->sortable()
                ->onlyOnDetail()
                ->showOnPreview(),

            Number::make(__('Last Activity'), 'last_activity')
                ->sortable()
                ->showOnPreview(),

        ];
    }
}
