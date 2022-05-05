<?php

namespace App\Http\Livewire;

use App\Contracts\SiteServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Events extends Component
{
    protected $queryString = [
        'filter' => '',
    ];

    public array $filter = [];

    public function getCategoriesProperty(): Builder|Collection
    {
        return static::siteService()->repositories()->events()->queryBuilder();
    }

    public function toggleCategory(mixed $value): void
    {
        $this->filter ??= ['category' => ''];

        $value = trim($value);

        $values = array_filter(explode(',', $this->filter['category'] ?? ''));

        if (in_array($value, $values, true)) {
            unset($values[array_search($value, $values, true)]);
        } else {
            $values[] = $value;
        }

        $this->filter['category'] = implode(',', $values);
    }

    public function render(): View
    {
        return view('livewire.events');
    }

    protected static function siteService(): SiteServiceContract
    {
        return resolve(SiteServiceContract::class);
    }
}
