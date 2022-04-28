<?php

namespace App\Nova\Metrics;

use App\Models\Session;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class ValueActiveSessions extends Value
{
    public $name = 'Active Sessions';

    public $icon = 'users';

    public function calculate(): ValueResult
    {
        return $this->result(Session::where('last_activity', '>=', time()-60)->count());
    }
}
