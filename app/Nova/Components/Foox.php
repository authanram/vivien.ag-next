<?php

namespace App\Nova\Components;

use App\Models\Model;
use Laravel\Nova\Http\Requests\NovaRequest;

class Foox extends Component
{
    public function name(): string
    {
        return 'Foox';
    }

    public function fields(NovaRequest $request, Model $resource): array
    {
        return [];
    }

    public function component(): \Illuminate\View\Component|string
    {
        return '';
    }
}
