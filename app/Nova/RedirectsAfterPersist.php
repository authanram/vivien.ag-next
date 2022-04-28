<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;

trait RedirectsAfterPersist
{
    public static function redirectAfterCreate(Request $request, $resource): string
    {
        if ($request->get('viaResource') && $request->get('viaResourceId')) {
            return "/resources/{$request->get('viaResource')}/{$request->get('viaResourceId')}";
        }

        return parent::redirectAfterCreate($request, $resource);
    }

    public static function redirectAfterUpdate(Request $request, $resource): string
    {
        if ($request->get('viaResource') && $request->get('viaResourceId')) {
            return "/resources/{$request->get('viaResource')}/{$request->get('viaResourceId')}";
        }

        return "/resources/{$resource::uriKey()}";
    }
}
