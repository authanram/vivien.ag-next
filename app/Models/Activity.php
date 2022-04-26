<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends \Spatie\Activitylog\Models\Activity
{
    protected $table = 'action_events';

    protected $fillable = [
        'name',
        'actionable_type',
        'actionable_id',
        'actionable_base_type',
        'model_type',
        'model_id',
        'changes',
        'created_at',
        'updated_at',
    ];

    // relations

    public function actionable(): MorphTo
    {
        return $this->morphTo();
    }
}
