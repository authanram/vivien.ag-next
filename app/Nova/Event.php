<?php

namespace App\Nova;

use Acme\DuplicateField\Duplicate;
use App\Nova\Filters\EventsTimeFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
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
    protected static array $orderBy = [
        'published' => 'asc',
        'date_from' => 'asc',
    ];

    public static string $model = \App\Models\Event::class;

    public static function group(): string
    {
        return __('Events');
    }

    public static $search = [
        'id',
        'description',
        'date_from',
        'date_to',
        'lead'
    ];

    public static array $searchRelations = [
        'eventLocation' => ['name'],
        'eventType' => ['name'],
    ];

    public static $with = [
        'eventType',
        'eventType',
        'eventLocation',
    ];

    public function fields(Request $request, bool $published = true): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            BelongsTo::make(__('Event Type'), 'eventType', EventType::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            BelongsTo::make(__('Event Location'), 'eventLocation', EventLocation::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
            ,
            DateTime::make(__('Date From'), 'date_from')
                ->rules('required')
                ->sortable()
            ,
            DateTime::make(__('Date To'), 'date_to')
                ->rules('required')
                ->sortable()
            ,
            Number::make(__('Attendees'), 'maximum_attendees')
                ->resolveUsing(fn () => $this->reserved_seats.' / '.$this->maximum_attendees)
                ->default(10)
                ->rules('required', 'numeric', 'min:1', 'gte:reserved_seats')
                ->sortable()
                ->min(1)
                ->help(__('Maximum attendees (excluding staff).'))
                ->exceptOnForms()
            ,
            Number::make(__('Attendees'), 'maximum_attendees')
                ->default(10)
                ->rules('required', 'numeric', 'min:1', 'gte:reserved_seats')
                ->sortable()
                ->min(1)
                ->help(__('Maximum attendees (excluding staff).'))
                ->onlyOnForms()
            ,
            Number::make(__('Reserved Seats'), 'reserved_seats')
                ->withMeta(['value' => $this->model()?->getAttribute('reserved_seats') ?? 0])
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
            Text::make(__('Catering'), 'catering')
                ->hideFromIndex()
            ,
            Text::make(__('Lead'), 'lead')
                ->default('Sybille Seuffer')
                ->hideFromIndex()
            ,
            Tags::make('Tags')
                ->type('event')
                ->withLinkToTagResource()
                ->hideFromIndex()
            ,
            Boolean::make(__('Published'), 'published')
                ->default($published)
                ->rules('boolean')
                ->sortable()
                ->trueValue(true)
                ->falseValue(false)
            ,
            Duplicate::make()
                ->showOnIndex()
                ->withMeta([
                    'resource' => 'events',
                    'model' => \App\Models\Event::class,
                    'id' => $this->id,
                    'relations' => ['tags'],
                    'override' => [
                        'date_from' => time(),
                        'date_to' => time(),
                        'reserved_seats' => null,
                        'published' => false,
                    ],
                ])
            ,
            HasMany::make(__('Attendees'), 'attendees', Attendee::class)
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

            ?->getAttribute('eventType')

            ?->getAttribute('name');
    }

    public static function label(): string
    {
        return __('Events');
    }

    public static function singularLabel(): string
    {
        return __('Event');
    }
}
