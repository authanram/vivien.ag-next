<?php

namespace App\Nova;

use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;

class EventRegistration extends Resource
{
    public static string $model = \App\Models\EventRegistration::class;

    public static $search = [
        'firstname',
        'surname',
        'phone',
        'email'
    ];

    public function fields(Request $request): array
    {
        return [
            Text::make(__('ID'), 'id')
                ->onlyOnDetail()
            ,
            BelongsTo::make(__('Event'), 'event', Event::class)
                ->rules('required')
                ->searchable()
                ->withoutTrashed()
                ->sortable()
            ,
            Text::make(__('Hash'), 'hash')
                ->onlyOnDetail()
                ->sortable()
            ,
            Select::make(__('Salutation'), 'salutation')
                ->options([0 => 'Frau', 1 => 'Herr'])
                ->onlyOnForms()
                ->sortable()
            ,
            Text::make(__('Salutation'), 'salutation', static fn ($value) => $value === 0
                ? __('Mrs')
                : __('Mr')
            )->exceptOnForms()
                ->sortable()
            ,
            Text::make(__('Firstname'), 'firstname')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Surname'), 'surname')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Phone'), 'phone')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Email'), 'email')
                ->rules('required')
                ->onlyOnForms()
                ->sortable()
            ,
            Text::make(__('Email'), 'email', static function ($value) {
                return "<a href=\"mailto:".$value."\" class=\"link-default\">".$value."</a>";
            })->rules('required')
                ->asHtml()
                ->exceptOnForms()
                ->sortable()
            ,
            Number::make(__('Seats'), 'seats')
                ->default(1)
                ->rules('required', 'numeric', 'min:1')
                ->sortable()
            ,
            Text::make(__('Message'), 'message')
                ->hideFromIndex()
            ,
            Text::make(__('Ip Address'), 'ip_address')
                ->onlyOnDetail()
            ,
            Text::make(__('User Agent'), 'user_agent')
                ->onlyOnDetail()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Registrations');
    }

    public static function singularLabel(): string
    {
        return __('Registration');
    }
}
