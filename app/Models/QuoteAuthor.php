<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class QuoteAuthor extends Model
{
    /** @use HasFactory<\Database\Factories\QuoteAuthorFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    final public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
