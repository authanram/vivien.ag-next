<?php

namespace App\Concerns;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Collection;

trait HasQuotes
{
    protected ?Collection $quotes = null;

    /** @noinspection PhpUndefinedMethodInspection */
    public function quotes(array $with = []): Collection
    {
        $this->quotes ??= $this->util->remember(
            Quote::class.'@'.__METHOD__,
            static fn () => Quote::with($with)
                ->wherePublished(true)
                ->get(['id', 'body', 'author_id']),
        );

        return $this->quotes;
    }
}
