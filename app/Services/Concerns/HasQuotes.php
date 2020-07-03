<?php

namespace App\Services\Concerns;

use App\Quote;
use Illuminate\Database\Eloquent\Collection;

trait HasQuotes
{
    protected ?Collection $quotes = null;

    final public function getQuotes(array $with = []): Collection
    {
        if (!$this->quotes) {
            $this->quotes = Quote::with($with)

                ->wherePublished(true)

                ->get(['id', 'body', 'author_id']);
        }

        return $this->quotes;
    }
}
