<?php

namespace App\Presenters\Models;

use App\Presenters\Presenter;
use Illuminate\Http\Request;

class ContentComponentPresenter extends Presenter
{
    public function render(Request $request): string
    {
        return __CLASS__;
    }
}
