<?php

namespace App\Presenters\Models;

use App\Presenters\Presenter;
use Illuminate\Http\Request;

class ContentTitlePresenter extends Presenter
{
    public function render(Request $request): string
    {
        $body = $this->get('body');

        return $body;
    }
}
