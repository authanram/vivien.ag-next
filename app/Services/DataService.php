<?php

namespace App\Services;

use App\Contracts\DataServiceContract;
use App\Services\Concerns;
use App\Util;

final class DataService implements DataServiceContract
{
    use Concerns\HasAccent;
    use Concerns\HasColors;
    use Concerns\HasImageCoords;
    use Concerns\HasMenus;
    use Concerns\HasQuotes;
    use Concerns\HasRoutes;

    public function __construct(protected Util $util)
    {
    }
}
