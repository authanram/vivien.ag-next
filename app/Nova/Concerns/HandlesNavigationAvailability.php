<?php

namespace App\Nova\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait HandlesNavigationAvailability
{
    public static function availableForNavigation(Request $request): bool
    {
        $slug = Str::kebab(\class_basename(__CLASS__));

        return $request->user()->can("browse:$slug");
    }
}
