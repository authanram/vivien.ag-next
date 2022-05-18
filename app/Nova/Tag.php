<?php

namespace App\Nova;

use App\Models\Tag as Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphedByMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Tag extends Resource
{
    use HasFieldOrderColumn;
    use HasSortableRows;

    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
    ];

    protected static array $orderBy = [
        'type' => 'asc',
        'name->de' => 'asc',
    ];

    public static $with = [
        'color',
    ];

    public static function label(): string
    {
        return __('Tags');
    }

    public static function singularLabel(): string
    {
        return __('Tag');
    }

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->creationRules('required', "unique:$table,slug")
                ->updateRules('required', "unique:$table,slug,{{resourceId}}")
                ->sortable()
                ->exceptOnForms()
                ->showOnPreview(),

            Select::make(__('Type'), 'type')
                ->options([
                    'event' => 'event',
                    'image' => 'image',
                    'post' => 'post',
                ])
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Color'), 'color', Color::class)
                ->nullable()
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->showOnPreview(),

            $this->orderColumn(),

            MorphedByMany::make(__('Events'), 'events', Event::class),

            MorphedByMany::make(__('Images'), 'images', Image::class),

            MorphedByMany::make(__('Posts'), 'posts', Post::class),
        ];
    }
}
