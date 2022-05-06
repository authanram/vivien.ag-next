<?php

namespace App\Nova;

use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class CookieConsentSettings extends Resource
{
    public static string $model = \App\Models\CookieConsentSettings::class;

    public static $title = 'session_id';

    public static $search = [
        'cookie_data',
        'session_data',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->exceptOnForms()
                ->sortable()
                ->showOnPreview()
            ,
            Code::make(__('Cookie Data'), 'cookie_data')
                ->default('{}')
                ->json()
                ->height('auto')
                ->showOnPreview()
            ,
            Code::make(__('Session Data'), 'session_data')
                ->default('{}')
                ->json()
                ->height('auto')
                ->showOnPreview()
            ,
            Line::make(__('Cookies'), function () {
                return implode(', ', array_keys($this->resource->cookie_data));
            })->showOnPreview()
            ,
            Line::make(__('Token'), function () {
                return $this->resource->session_data['_token'];
            })->showOnPreview()
            ,
            Line::make(__('Referer'), function () {
                $url = $this->resource->session_data['_previous']['url'];
                return "<a href=\"$url\" class=\"link-default\">$url</a>";
            })->asHtml()->showOnPreview()
            ,
            Line::make(__('Date of Consent'), function () {
                return (string)$this->resource->created_at;
            })->showOnPreview()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Consents');
    }

    public static function singularLabel(): string
    {
        return __('Consent');
    }
}
