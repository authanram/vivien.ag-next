<?php

namespace App\Nova;

use App\Models\Page as Model;
use Authanram\NovaMorphable\Nova\MorphMany;
use Exception;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Page extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['view'];

    public static $search = [
        'name',
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
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Template'), 'view', View::class)
                ->sortable()
                ->showOnPreview(),

            MorphMany::make(__('Morphables'), __CLASS__),
        ];
    }
}
