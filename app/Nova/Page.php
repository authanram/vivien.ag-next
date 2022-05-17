<?php

namespace App\Nova;

use App\Models\Layout;
use App\Models\Page as Model;
use Closure;
use Exception;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Page extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['layout', 'staticBlocks'];

    public static $search = [
        'name',
        'layout',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Pages');
    }

    public static function singularLabel(): string
    {
        return __('Page');
    }

    /**
     * @throws Exception
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Layout'), 'layout')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            //$this->sectionFields($this->resource),

            BelongsToMany::make(__('Static Blocks'), 'staticBlocks', StaticBlock::class)
                ->fields(fn () => [
                    Text::make(__('Slug'), 'slug')
                        ->rules('required', 'alpha_dash')
                        ->showOnPreview(),
                ]),
        ];
    }

    private function sectionFields($r)
    {
        return Panel::make('Fff', [
            Text::make('foo'),
        ]);

        return [];

//        Panel::make('Sections', [
//            Select::make(__('Section'), 'section')
//                ->displayUsingLabels()
//                ->dependsOn(
//                    ['layout'],
//                    function (Select $field, NovaRequest $request, FormData $formData) {
//                        $sections = Layout::find($formData->layout)->sections;
//                        $field->options(array_combine($sections, $sections));
//                    }
//                ),
//
//            Select::make(__('Type'), 'type')
//                ->options(['html' => 'html', 'markdown' => 'markdown'])
//                ->hide()
//                ->dependsOn(
//                    ['section'],
//                    function (Select $field, NovaRequest $request, FormData $formData) {
//                        if ($formData->section !== null) {
//                            $field->show();
//                        }
//                    }
//                ),
//
//        ]);
    }
}
