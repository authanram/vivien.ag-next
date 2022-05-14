<?php

namespace App\Nova;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class PageStaticBlockFields
{
    public function __invoke(NovaRequest $request, Model $relatedModel): array
    {
        if (self::authorize($request) === false) {
            return [];
        }

        $sections = $relatedModel->getAttribute('sections') ?? [];

        $pivot = $relatedModel->getAttribute('pivot');

        if ($pivot || ($relatedModel::class === Page::class && $relatedModel->getAttributes() !== [])) {
            $page = is_null($pivot) === false
                ? Page::find($pivot->getAttribute('page_id'))
                : $relatedModel;

            $sections = $page->load('layout')?->layout->sections;
        }

        $options = self::makeOptionsArray($sections);

        $select = Select::make(__('Section'), 'section');

        if ($options === []) {
            $select->hide();
        }

        return [
            $select
                ->options($options)
                ->rules('required')
                ->dependsOn(
                    ['pages'],
                    function (Select $field, NovaRequest $request, FormData $formData) {
                        $pageId = $formData->get('pages');

                        if (is_null($pageId)) {
                            return;
                        }

                        $sections = Page::with('layout')
                            ->find($pageId)
                            ?->getAttribute('layout')
                            ?->getAttribute('sections');

                        if (is_null($sections)) {
                            return;
                        }

                        $field->options(self::makeOptionsArray($sections))->show();
                    }
                ),
        ];
    }

    private static function makeOptionsArray(array $sections): array
    {
        return collect($sections)
            ->mapWithKeys(fn ($section) => [$section => $section])
            ->toArray();
    }

    private static function authorize(NovaRequest $request): bool
    {
        return $request->isUpdateOrUpdateAttachedRequest()
            || $request->isCreateOrAttachRequest();
    }
}
