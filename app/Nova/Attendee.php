<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;

class Attendee extends Resource
{
    public static string $model = \App\Models\Attendee::class;

    public static $search = [
        'id',
        'firstname',
        'surname',
        'phone',
        'email'
    ];

    public static function group(): string
    {
        return __('Events');
    }

    final public function fields(Request $request): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
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
            Number::make(__('Salutation'), 'salutation')
                ->rules('required')
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
                ->sortable()
            ,
            Number::make(__('Attendance'), 'attendance')
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

    final public static function label(): string
    {
        return __('Attendees');
    }

    final public static function singularLabel(): string
    {
        return __('Attendee');
    }
}
