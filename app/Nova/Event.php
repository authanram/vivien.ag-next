<?php

namespace App\Nova;

//use Laravel\Nova\Fields\BooleanGroup;
use App\Nova\Filters\EventsTimeFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Spatie\TagsField\Tags;

class Event extends Resource
{
    public static string $model = \App\Models\Event::class;

    public static $search = [
        'description',
        'date_from',
        'date_to',
        'lead'
    ];

    public static array $searchRelations = [
        'eventTemplate' => ['name'],
        'catering' => ['name'],
        'location' => ['name'],
    ];

    public static $with = [
        'eventTemplate',
        'catering',
        'location',
    ];

    protected static array $orderBy = [
        'published' => 'asc',
        'date_from' => 'asc',
    ];

    public function fields(Request $request, bool $published = true): array
    {
        return [
            ID::make()
            ,
            Text::make(__('UUID'), 'uuid')
                ->onlyOnDetail()
            ,
            BelongsTo::make(__('Event Template'), 'eventTemplate', EventTemplate::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
                ->showOnPreview()
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
                ->showOnPreview()
            ,
            BelongsTo::make(__('Location'), 'location', Location::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
                ->showOnPreview()
            ,
            DateTime::make(__('Date From'), 'date_from')
                ->rules('required')
                ->sortable()
                ->onlyOnForms()
                ->showOnPreview()
            ,
            DateTime::make(__('Date To'), 'date_to')
                ->rules('required')
                ->sortable()
                ->onlyOnForms()
                ->showOnPreview()
            ,
            Stack::make(__('Date From/To'), [
                Line::make(null, static function ($model) {
                    return $model->presenter()->dateFrom();
                })->extraClasses('font-bold text-sm'),
                Line::make(null, static function ($model) {
                    return $model->presenter()->dateTo();
                })->asSmall(),
            ])->exceptOnForms()
            ,
            Line::make(__('Registrations'), static function ($model) {
                return $model->registrations_reserved.' / '.$model->registrations_maximum;
            })->exceptOnForms()
                ->showOnPreview()
                ->extraClasses('text-sm')
                ->exceptOnForms()
            ,
            Number::make(__('Maximum Registrations'), 'registrations_maximum')
                ->default(10)
                ->rules('required', 'numeric', 'min:1', 'gte:registrations_reserved')
                ->sortable()
                ->min(1)
                ->help(__('Maximum Registrations (excluding staff).'))
                ->onlyOnForms()
                ->showOnPreview()
            ,
            Number::make(__('Reserved Registrations'), 'registrations_reserved')
                ->withMeta(['value' => $this->model()?->getAttribute('registrations_reserved') ?? 0])
                ->rules('required', 'numeric', 'min:0')
                ->default(0)
                ->sortable()
                ->hideFromIndex()
                ->showOnPreview()
            ,
            Currency::make(__('Price'), 'price')
                ->currency('EUR')
                ->rules('nullable', 'numeric')
                ->showOnPreview()
            ,
            Text::make(__('Price Note'), 'price_note')
                ->hideFromIndex()
                ->showOnPreview()
            ,
            BelongsTo::make(__('Catering'), 'catering', Catering::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
                ->hideFromIndex()
                ->showOnPreview()
            ,
            Tags::make('Tags')
                ->type('event')
                ->withLinkToTagResource()
                ->hideFromIndex()
                ->showOnPreview()
            ,
//            BooleanGroup::make('Tags')->options([
//                'create' => 'Create',
//                'read' => 'Read',
//                'update' => 'Update',
//                'delete' => 'Delete',
//            ])->hideFalseValues(),
            Boolean::make(__('Published'), 'published')
                ->default($published)
                ->rules('boolean')
                ->sortable()
                ->trueValue(true)
                ->falseValue(false)
                ->showOnPreview()
            ,
            BelongsToMany::make(__('Lead'), 'staffProfiles', StaffProfile::class)
                ->hideFromIndex()
                ->showOnPreview()
            ,
            HasMany::make(__('Event Registrations'), 'eventRegistrations', EventRegistration::class)
                ->showOnPreview()
            ,
        ];
    }

    public function filters(Request $request): array
    {
        return [
            EventsTimeFilter::make(),
        ];
    }

    public function title(): string
    {
        return $this
            ->model()
            ?->getAttribute('eventTemplate')
            ?->getAttribute('name');
    }

    public static function label(): string
    {
        return __('Events');
    }

    public static function singularLabel(): string
    {
        return __('Events');
    }
}
