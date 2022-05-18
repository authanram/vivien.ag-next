<?php

namespace App\Nova;

use App\Models\CookieConsentSettings as Model;
use Exception;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
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
    public function fields(Request $request): array
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

            Line::make(__('Cookies'), function () {
                return implode(', ', array_keys($this->resource->cookie_data));
            })->showOnPreview(),

            Line::make(__('Token'), function () {
                return $this->resource->session_data['_token'];
            })->showOnPreview(),

            Line::make(__('Referer'), function () {
                $url = $this->resource->session_data['_previous']['url'];
                return "<a href=\"$url\" class=\"link-default\">$url</a>";
            })->asHtml()->showOnPreview(),

            Line::make(__('Date of Consent'), function () {
                return (string)$this->resource->created_at;
            })->showOnPreview(),
        ];
    }
}
