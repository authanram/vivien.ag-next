<?php

namespace App\Services;

use App\Contracts\DataServiceContract;
use App\Services\Concerns\HasAccent;
use App\Services\Concerns\HasColors;
use App\Services\Concerns\HasImageCoords;
use App\Services\Concerns\HasMenus;
use App\Services\Concerns\HasQuotes;
use App\Services\Concerns\HasRoutes;

final class DataService implements DataServiceContract
{
    use HasAccent;
    use HasColors;
    use HasImageCoords;
    use HasMenus;
    use HasQuotes;
    use HasRoutes;
}
