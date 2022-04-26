<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface DataServiceContract
{
    public function accent(Request $request): string;
    public function colors(array $with = []): Collection;
    public function imageCoords(): array;
    public function menus(): array;
    public function quotes(array $with = []): Collection;
    public function routes(array $with = []): Collection;
}
