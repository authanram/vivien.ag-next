<?php

namespace App\Nova;

//use Laravel\Nova\Fields\BooleanGroup;
use App\Nova\Filters\EventsTimeFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
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
            BelongsTo::make(__('Events Template'), 'eventTemplate', EventTemplate::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
            ,
            BelongsTo::make(__('Location'), 'location', Location::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            DateTime::make(__('Date From'), 'date_from')
                ->rules('required')
                ->sortable()
            ,
            DateTime::make(__('Date To'), 'date_to')
                ->rules('required')
                ->sortable()
            ,
            Number::make(__('Registrations Limit'), 'registrations_limit')
                ->resolveUsing(function () {
                    return $this->registrations_reserved.' / '.$this->registrations_limit;
                })
                ->default(10)
                ->rules('required', 'numeric', 'min:1', 'gte:registrations_reserved')
                ->sortable()
                ->min(1)
                ->help(__('Registrations Limit (excluding staff).'))
                ->exceptOnForms()
            ,
            Number::make(__('Registrations Limit'), 'registrations_limit')
                ->default(10)
                ->rules('required', 'numeric', 'min:1', 'gte:registrations_reserved')
                ->sortable()
                ->min(1)
                ->help(__('Registrations Limit (excluding staff).'))
                ->onlyOnForms()
            ,
            Number::make(__('Registrations Reserved'), 'registrations_reserved')
                ->withMeta(['value' => $this->model()?->getAttribute('registrations_reserved') ?? 0])
                ->rules('required', 'numeric', 'min:0')
                ->default(0)
                ->sortable()
                ->hideFromIndex()
            ,
            Number::make(__('Price'), 'price')
                ->rules('nullable', 'numeric')
            ,
            Text::make(__('Price Note'), 'price_note')
                ->hideFromIndex()
            ,
            BelongsTo::make(__('Catering'), 'catering', Catering::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
                ->hideFromIndex()
            ,
            Tags::make('Tags')
                ->type('event')
                ->withLinkToTagResource()
                ->hideFromIndex()
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
            ,
            BelongsToMany::make(__('Lead'), 'staffProfiles', StaffProfile::class)
                ->hideFromIndex()
            ,
            HasMany::make(__('Registrations'), 'eventRegistrations', EventRegistration::class)
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
