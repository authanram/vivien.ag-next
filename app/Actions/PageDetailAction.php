<?php

namespace App\Actions;

use Illuminate\Http\Request;

class PageDetailAction extends ViewAction
{
    public function response(Request $request, string $slug = null): string
    {
        return $slug;
    }
}
