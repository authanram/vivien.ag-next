<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;

trait RedirectsAfterPersist
{
    public static function redirectAfterCreate(NovaRequest $request, $resource): string
    {
        if ($request->get('viaResource') && $request->get('viaResourceId')) {
            return "/resources/{$request->get('viaResource')}/{$request->get('viaResourceId')}";
        }

        return parent::redirectAfterCreate($request, $resource);
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource): string
    {
        if ($request->get('viaResource') && $request->get('viaResourceId')) {
            return "/resources/{$request->get('viaResource')}/{$request->get('viaResourceId')}";
        }

        return "/resources/{$resource::uriKey()}";
    }
}
