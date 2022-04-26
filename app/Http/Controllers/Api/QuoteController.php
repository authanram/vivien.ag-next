<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Support\Collection;

final class QuoteController extends ApiController
{
    public function random(): Collection
    {
        $quotes = $this->dataService->getQuotes()->toArray();

        try {
            $index = random_int(0, count($quotes) - 1);
            return collect($quotes[$index]);
        } catch (Exception $exception) {
            report($exception);
            abort(500, $exception->getMessage());
        }
    }
}
