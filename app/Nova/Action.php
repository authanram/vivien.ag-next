<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Actions\ActionResource;

class Action extends ActionResource
{
    public static $group = 'System';

    public static function availableForNavigation(Request $request): bool
    {
        return true;
    }
}
