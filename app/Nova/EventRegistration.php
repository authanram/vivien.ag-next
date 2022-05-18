<?php

namespace App\Nova;

use App\Models\EventRegistration as Model;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;

class EventRegistration extends Resource
{
    public static string $model = Model::class;

    public static $search = [
        'firstname',
        'surname',
        'phone',
        'email'
    ];

    public static $with = [
        'event',
        'event.eventTemplate',
    ];

    public static function label(): string
    {
        return __('Event Registrations');
    }

    public static function singularLabel(): string
    {
        return __('Event Registration');
    }

    public function fields(Request $request): array
    {
        return [
            Text::make(__('ID'), 'id')
                ->onlyOnDetail()
                ->showOnPreview(),

            Text::make(__('UUID'), 'uuid')
                ->onlyOnDetail()
                ->showOnPreview(),

            BelongsTo::make(__('Events'), 'event', Event::class)
                ->rules('required')
                ->searchable()
                ->withoutTrashed()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Hash'), 'hash')
                ->onlyOnDetail()
                ->sortable()
                ->showOnPreview(),

            Select::make(__('Salutation'), 'salutation')
                ->options([0 => 'Frau', 1 => 'Herr'])
                ->onlyOnForms()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Salutation'), 'salutation', static fn ($value) => $value === 0
                ? __('Mrs')
                : __('Mr')
            )->exceptOnForms()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Firstname'), 'firstname')
                ->rules('required')
                ->onlyOnForms(),

            Text::make(__('Surname'), 'surname')
                ->rules('required')
                ->onlyOnForms(),

            Text::make(__('Name'), 'full_name')
                ->exceptOnForms()
                ->showOnPreview(),

            Text::make(__('Phone'), 'phone')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Email'), 'email')
                ->rules('required')
                ->onlyOnForms()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Email'), 'email', static function ($value) {
                return "<a href=\"mailto:".$value."\" class=\"link-default\">".$value."</a>";
            })->rules('required')
                ->asHtml()
                ->exceptOnForms()
                ->sortable()
                ->showOnPreview(),

            Number::make(__('Seats'), 'seats')
                ->default(1)
                ->rules('required', 'numeric', 'min:1')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Message'), 'message')
                ->hideFromIndex()
                ->showOnPreview(),

            Text::make(__('Ip Address'), 'ip_address')
                ->onlyOnDetail()
                ->showOnPreview(),

            Text::make(__('User Agent'), 'user_agent')
                ->onlyOnDetail()
                ->showOnPreview(),

        ];
    }
}
