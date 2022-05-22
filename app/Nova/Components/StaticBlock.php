<?php

namespace App\Nova\Components;

use App\Models\Model;
use App\Nova\Components\Fields\SelectField;
use Laravel\Nova\Http\Requests\NovaRequest;

class StaticBlock extends Component
{
    public function name(): string
    {
        return __('Static Block');
    }

    public function fields(NovaRequest $request, Model $resource): array
    {
        return [
            new SelectField($this->name(), 'data->static_block[]')
        ];
    }

    public function component(): \Illuminate\View\Component|string
    {
        return '';
    }
}
