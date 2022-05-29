<?php

namespace App\Nova;


use App\Models\CookieConsentCookie as Model;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CookieConsentCookie extends Resource
{
    public static string $model = Model::class;

    public static $title = 'cookie_name';

    public static $search = [
        'cookie_name',
        'cookie_purpose',
        'cookie_type',
        'cookie_category',
        'cookie_type',
    ];

    public static $with = ['cookieProvider:id,name'];

    public static function label(): string
    {
        return __('Cookies');
    }

    public static function singularLabel(): string
    {
        return __('Cookie');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Cookie Name'), 'cookie_name')
                ->creationRules('required', 'unique:cookie_consent_cookies,cookie_name')
                ->updateRules('required', 'unique:cookie_consent_cookies,cookie_name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Cookie Provider'), 'cookieProvider', CookieConsentProvider::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->showOnPreview(),

            Code::make(__('Cookie Purpose'), 'cookie_purpose')
                ->rules('required')
                ->height('auto')
                ->showOnPreview(),

            Text::make(__('Cookie Category'), 'cookie_category')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Cookie Type'), 'cookie_type')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Number::make(__('Cookie Lifetime'), 'cookie_lifetime')
                ->rules('required')
                ->help('In days.')
                ->sortable()
                ->showOnPreview(),

            Boolean::make(__('Encrypted'), 'encrypted')
                ->sortable()
                ->showOnPreview(),

            Boolean::make(__('Required'), 'required')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
