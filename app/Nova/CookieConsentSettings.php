<?php

namespace App\Nova;

use App\Models\CookieConsentSettings as Model;
use Exception;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class CookieConsentSettings extends Resource
{
    public static string $model = Model::class;

    public static $title = 'session_id';

    public static $search = [
        'cookie_data',
        'session_data',
    ];

    public static function label(): string
    {
        return __('Consents');
    }

    public static function singularLabel(): string
    {
        return __('Consent');
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

            Code::make(__('Cookie Data'), 'cookie_data')
                ->default('{}')
                ->autoHeight()
                ->json()
                ->rules('json')
                ->showOnPreview(),

            Code::make(__('Session Data'), 'session_data')
                ->default('{}')
                ->autoHeight()
                ->json()
                ->rules('json')
                ->showOnPreview(),

            Line::make(__('Cookies'), fn () => implode(', ', array_keys($this->resource->cookie_data)))
                ->extraClasses('text-sm'),

            Line::make(__('Token'), fn () => $this->resource->session_data['_token'])
                ->extraClasses('text-sm'),

            Line::make(__('Referer'), function () {
                $url = $this->resource->session_data['_previous']['url'];
                return "<a href=\"$url\" class=\"link-default\">$url</a>";
            })->extraClasses('text-sm')->asHtml(),

            Line::make(__('Date of Consent'), fn () => (string)$this->resource->created_at)
                ->extraClasses('text-sm'),
        ];
    }

    public function authorizedToDelete(Request $request): bool
    {
        return false;
    }
}
