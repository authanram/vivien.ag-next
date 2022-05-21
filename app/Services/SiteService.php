<?php

namespace App\Services;

use App\Contracts\SiteService as Contract;
use Illuminate\Http\Request;

final class SiteService implements Contract
{
    public function __construct(protected Request $request)
    {
    }
}
