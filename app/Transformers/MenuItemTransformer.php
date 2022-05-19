<?php

namespace App\Transformers;

use App\Models\MenuItem;

class MenuItemTransformer extends BaseTransformer
{
    public function transform(MenuItem $menuItem = null): array
    {
        return $menuItem?->toArray();
    }
}
