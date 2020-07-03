<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;

trait RedirectsAfterPersist
{
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        if ($request->viaResource) {
            return "/resources/{$request->viaResource}/{$request->viaResourceId}";
        }

        //return "/resources/{$resource::uriKey()}";
        return parent::redirectAfterCreate($request, $resource);
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        if ($request->viaResource) {
            return "/resources/{$request->viaResource}/{$request->viaResourceId}";
        }

        return "/resources/{$resource::uriKey()}";
        //return parent::redirectAfterUpdate($request, $resource);
    }
}
