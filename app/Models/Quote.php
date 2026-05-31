<?php

namespace App\Models;

use App\Traits\HasUuids;
use Database\Factories\QuoteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class Quote extends Model
{
    /** @use HasFactory<QuoteFactory> */
    use HasFactory;

    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    final public function quoteAuthor(): BelongsTo
    {
        return $this->belongsTo(QuoteAuthor::class);
    }
}
