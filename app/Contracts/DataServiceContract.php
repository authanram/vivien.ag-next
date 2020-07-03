<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface DataServiceContract
{
    public function getImageCoords(): array;

    public function getMenus(): array;

    public function getAccent(Request $request): string;

    public function getColors(array $with = []): Collection;

    public function getRoutes(array $with = []): Collection;

    public function getQuotes(array $with = []): Collection;
}
