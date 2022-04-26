<?php

namespace App\Services\Concerns;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Collection;

trait HasQuotes
{
    protected ?Collection $quotes = null;

    public function getQuotes(array $with = []): Collection
    {
        if (!$this->quotes) {

            $this->quotes = Quote::with($with)

                ->wherePublished(true)

                ->get(['id', 'body', 'author_id']);

        }

        return $this->quotes;
    }
}
