<?php

namespace App\Nova;

use App\Models\EventRegistration as Model;
use App\Models\EventTemplate;
use Exception;
use Illuminate\Support\Carbon;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Panel;

class EventRegistration extends Resource
{
    public static string $model = Model::class;

    protected static array $orderBy = [
        'created_at' => 'desc',
    ];

    public static $search = [
        'firstname',
        'surname',
        'phone',
        'email'
    ];

    public static $with = [
        'event:id,event_template_id',
        'event.eventTemplate:id,name',
    ];

    public static function label(): string
    {
        return __('Event Registrations');
    }

    public static function singularLabel(): string
    {
        return __('Event Registration');
    }

    public function title(): string
    {
        return $this->resource->firstname.' '.$this->resource->surname;
    }

    /**
     * @throws Exception
     */
    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('UUID'), 'uuid')
                ->onlyOnDetail()
                ->showOnPreview(),

            Text::make(__('Hash'), 'hash')
                ->onlyOnDetail()
                ->showOnPreview(),

            BelongsTo::make(__('Event'), 'event', Event::class)
                ->hideFromIndex(is_null($request->get('relationshipType')) === false)
                ->exceptOnForms()
                ->showOnPreview(),

            Select::make(__('Salutation'), 'salutation')
                ->options([0 => 'Frau', 1 => 'Herr'])
                ->onlyOnForms()
                ->showOnPreview(),

            Text::make(__('Salutation'), 'salutation', static fn ($value) => $value === 0
                ? __('Mrs')
                : __('Mr')
            )->exceptOnForms()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Firstname'), 'firstname')
                ->rules('required')
                ->sortable(),

            Text::make(__('Surname'), 'surname')
                ->rules('required')
                ->sortable(),

            Text::make(__('Phone'), 'phone')
                ->displayUsing(static fn ($value) => "<a href=\"tel:".$value."\" class=\"link-default\">".$value."</a>")
                ->asHtml()
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Email'), 'email')
                ->displayUsing(static fn ($value) => "<a href=\"mailto:".$value."\" class=\"link-default\">".$value."</a>")
                ->asHtml()
                ->rules('required')
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

    public function fieldsForCreate(Request $request): array
    {
        return $this->fieldsForForms($request);
    }

    public function fieldsForUpdate(Request $request): array
    {
        return $this->fieldsForForms($request);
    }

    private function fieldsForForms(Request $request): array
    {
        $fields = $this->fields($request);

        $fields[] = Panel::make(__('Event'), [
            Select::make(__('Event'), 'event->event_template_id')
                ->options(EventTemplate::all()->pluck('name', 'id')->sort()->toArray())
                ->withMeta(['attribute' => 'eventTemplate'])
                ->onlyOnForms(),

            Select::make(__('Date'), 'event_id', fn () => $this->resource->event_id)
                ->displayUsingLabels()
                ->rules('required')
                ->hide()
                ->onlyOnForms()
                ->dependsOn(['eventTemplate'], static function ($field, $request, $formData) {
                    $eventTemplateId = $formData->get('eventTemplate');

                    if (is_null($eventTemplateId)) {
                        $field->options([])->hide();
                        return;
                    }

                    $options = EventTemplate::with('events')
                        ->find($eventTemplateId)
                        ?->getAttribute('events')
                        ?->sortBy('date_from')
                        ?->pluck('date_from', 'id')
                        ?->mapWithKeys(fn (Carbon $value, $key) => [$key => $value->format('d.m.Y')])
                        ?->toArray();

                    $field->options($options ?? [])->show();
                }),

            Number::make(__('Seats'), 'seats')
                ->default(1)
                ->rules('required', 'numeric', 'min:1')
                ->sortable()
                ->showOnPreview(),
        ]);

        return $fields;
    }
}
