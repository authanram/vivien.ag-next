<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class QuoteController extends ApiController
{
    final public function random(Request $request): Collection
    {
        $quotes = $this->dataService->getQuotes()->toArray();

        try {

            $index = \random_int(0, count($quotes) - 1);

            return collect($quotes[$index]);

        } catch (\Exception $exception) {

            \report($exception);

            abort(500, $exception->getMessage());

        }
    }
}
