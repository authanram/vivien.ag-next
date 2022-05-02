<?php

namespace App\Nova;

//use App\Nova\Metrics\PartitionEventTemplate;
use App\Models\Catering as CateringModel;
use App\Models\StaffProfile as StaffProfileModel;
use App\Nova\Filters\EventsTimeFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use JsonException;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
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
    public static string $model = \App\Models\Event::class;

    public static $search = [
        'date_from',
        'date_to',
        'eventTemplate.name',
        'catering.name',
        'location.name',
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

    /**
     * @throws JsonException
     */
    protected static function afterValidation(NovaRequest $request, $validator): void
    {
        if (in_array(true, json_decode($request->get('staff'), true, 512, JSON_THROW_ON_ERROR), true) === false) {
            $validator->errors()->add('staff', __('validation.required', ['attribute' => __('Lead')]));
        }
    }

    public static function afterCreate(NovaRequest $request, Model $model): void
    {
        static::syncStaffEvents($request->get('staff'), $model);
    }

    public static function afterUpdate(NovaRequest $request, Model $model): void
    {
        static::syncStaffEvents($request->get('staff'), $model);
    }

    /**
     * @param self $model
     * @noinspection PhpDocSignatureInspection
     */
    protected static function syncStaffEvents(string $staff, Model $model): void
    {
        /** @noinspection JsonEncodingApiUsageInspection */
        $names = collect(json_decode($staff, true))
            ->filter(fn ($value) => $value === true)
            ->keys()
            ->toArray();

        $ids = StaffProfileModel::whereIn('name', $names)->pluck('id')->toArray();

        $model->staffProfiles()->sync($ids);
    }

    public static function label(): string
    {
        return __('Events');
    }

    public static function singularLabel(): string
    {
        return __('Events');
    }

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
                Line::make(null, fn () => $this->resource->present()->dateFrom())
                    ->extraClasses('font-bold text-sm')
                ,
                Line::make(null, fn () => $this->resource->present()->dateTo())
                    ->asSmall(),
            ])->exceptOnForms()
            ,
            Stack::make(__('Event Registrations'), [
                Line::make(null, fn () => $this->resource->present()->registrationsCurrent())
                    ->showOnPreview()
                    ->extraClasses('font-bold text-sm')
                    ->exceptOnForms()
                ,
                Line::make(null, fn () => $this->resource->present()->registrationsPreview())
                    ->asSmall()
                ,
            ]),
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
                ->withMeta(['value' => $this->resource->registrations_reserved ?? 0])
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
                ->onlyOnForms()
            ,
            Stack::make(__('Price'), [
                Line::make(null, fn () => $this->resource->price.' €')
                    ->extraClasses('font-bold text-sm')
                ,
                Line::make(null, fn () => $this->resource->present()->profitPreview())
                    ->asSmall()
                ,
            ]),
            Text::make(__('Price Note'), 'price_note')
                ->hideFromIndex()
                ->showOnPreview()
            ,
            BelongsTo::make(__('Catering'), 'catering', Catering::class)
                ->default(fn () => CateringModel::$presenter::default()?->id)
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
            BooleanGroup::make(__('Lead'), 'staff', function () {
                return StaffProfileModel::$presenter::toOptionArrayValues($this->resource->staffProfiles);
            })->options(StaffProfileModel::$presenter::toOptionArrayOptions())
                ->hideFromIndex()
            ,
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

    public function cards(NovaRequest $request): array
    {
        return [
            //new PartitionEventTemplate(),
        ];
    }
}
