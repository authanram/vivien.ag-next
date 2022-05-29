<?php

namespace App\Nova;

//use App\Nova\Metrics\PartitionEventTemplate;
use App\Models\Catering as CateringModel;
use App\Models\Event as Model;
use App\Models\Staff as StaffModel;
use App\Nova\Filters\EventsTimeFilter;
use Illuminate\Database\Eloquent\Model as BaseModel;
use JsonException;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class Event extends Resource
{
    public static string $model = Model::class;

    public static $search = [
        'id',
        'date_from',
        'date_to',
        'eventTemplate.name',
        'catering.name',
        'location.name',
    ];

    public static $with = [
        'eventRegistrations:event_id,seats',
        'eventTemplate:id,name',
        'location:id,name',
    ];

    protected static array $orderBy = [
        'published' => 'asc',
        'date_from' => 'asc',
    ];

    public static $title = 'eventTemplate.name';

    /**
     * @throws JsonException
     */
    protected static function afterValidation(NovaRequest $request, $validator): void
    {
        if (in_array(true, json_decode($request->get('staff'), true, 512, JSON_THROW_ON_ERROR), true) === false) {
            $validator->errors()->add('staff', __('validation.required', ['attribute' => __('Lead')]));
        }
    }

    public static function afterCreate(NovaRequest $request, BaseModel $model): void
    {
        static::syncStaffEvents($request->get('staff'), $model);
    }

    public static function afterUpdate(NovaRequest $request, BaseModel $model): void
    {
        static::syncStaffEvents($request->get('staff'), $model);
    }

    /**
     * @param self $model
     * @noinspection PhpDocSignatureInspection
     */
    protected static function syncStaffEvents(string $staff, BaseModel $model): void
    {
        /** @noinspection JsonEncodingApiUsageInspection */
        $names = collect(json_decode($staff, true))
            ->filter(fn ($value) => $value === true)
            ->keys()
            ->toArray();

        $ids = StaffModel::whereIn('name', $names)->pluck('id')->toArray();

        $model->getAttribute('staff')->sync($ids);
    }

    public static function label(): string
    {
        return __('Events');
    }

    public static function singularLabel(): string
    {
        return __('Event');
    }

    public function fields(NovaRequest $request, bool $published = true): array
    {
        //ray($this->resource);

        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('UUID'), 'uuid')
                ->onlyOnDetail(),

            BelongsTo::make(__('Event Template'), 'eventTemplate', EventTemplate::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->sortable()
                ->showOnPreview(),

            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
                ->showOnPreview(),

            BelongsTo::make(__('Location'), 'location', Location::class)
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
                ->showOnPreview(),

            DateTime::make(__('Date From'), 'date_from')
                ->rules('required')
                ->onlyOnForms()
                ->showOnPreview(),

            DateTime::make(__('Date To'), 'date_to')
                ->rules('required')
                ->onlyOnForms()
                ->showOnPreview(),

            Stack::make(__('Date From/To'), [
                Line::make(null, fn () => $this->resource->dateFrom())
                    ->extraClasses('font-bold text-sm'),
                Line::make(null, fn () => $this->resource->dateTo())
                    ->asSmall(),
            ])->exceptOnForms()->showOnPreview(),

            Stack::make(__('Event Registrations'), [
                Line::make(null, fn () => $this->resource->registrationsCurrent())
                    ->showOnPreview()
                    ->extraClasses('font-bold text-sm')
                    ->exceptOnForms(),
                Line::make(null, fn () => $this->resource->registrationsPreview())
                    ->asSmall(),
            ])->showOnPreview(),

            Number::make(__('Maximum Registrations'), 'registrations_maximum')
                ->default(10)
                ->min(1)
                ->help(__('Maximum Registrations (excluding staff).'))
                ->rules('required', 'numeric', 'min:1', 'gte:registrations_reserved')
                ->onlyOnForms()
                ->showOnPreview(),

            Number::make(__('Reserved Registrations'), 'registrations_reserved')
                ->default(0)
                ->withMeta(['value' => $this->resource->registrations_reserved ?? 0])
                ->rules('required', 'numeric', 'min:0')
                ->hideFromIndex()
                ->showOnPreview(),

            Currency::make(__('Price'), 'price')
                ->currency('EUR')
                ->rules('nullable', 'numeric')
                ->onlyOnForms()
                ->showOnPreview(),

            Stack::make(__('Price'), [
                Line::make(null, fn () => $this->resource->price.' €')
                    ->extraClasses('font-bold text-sm'),

                Line::make(null, fn () => $this->resource->profitPreview())
                    ->asSmall(),
            ]),

            Text::make(__('Price Note'), 'price_note')
                ->hideFromIndex()
                ->showOnPreview(),

            BelongsTo::make(__('Catering'), 'catering', Catering::class)
                ->default(fn () => CateringModel::$presenter::default()?->id)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->hideFromIndex()
                ->showOnPreview(),

            Tags::make('Tags')
                ->type('event')
                ->withLinkToTagResource()
                ->hideFromIndex()
                ->showOnPreview(),

            BooleanGroup::make(__('Lead'), 'staff', fn () => [])
                ->options([])
                ->hideFromIndex()
                ->showOnPreview(),

            Boolean::make(__('Published'), 'published')
                ->default($published)
                ->trueValue(true)
                ->falseValue(false)
                ->rules('boolean')
                ->sortable()
                ->showOnPreview(),

            HasMany::make(__('Event Registrations'), 'eventRegistrations', EventRegistration::class)
                ->showOnPreview(),
        ];
    }

    public function filters(NovaRequest $request): array
    {
        return $request->viaRelationship() === false
            ? [EventsTimeFilter::make()]
            : [];
    }

    public function cards(NovaRequest $request): array
    {
        return [
            //new PartitionEventTemplate(),
        ];
    }
}
