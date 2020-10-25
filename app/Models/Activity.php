<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string $batch_id
 * @property int $user_id
 * @property string $name
 * @property string $actionable_type
 * @property int $actionable_id
 * @property string $target_type
 * @property int $target_id
 * @property string $model_type
 * @property int|null $model_id
 * @property string $fields
 * @property string $status
 * @property string $exception
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $original
 * @property \Illuminate\Support\Collection $changes
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $actionable
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $causer
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subject
 * @method static Builder|Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static Builder|Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static Builder|Activity inLog($logNames)
 * @method static Builder|Activity newModelQuery()
 * @method static Builder|Activity newQuery()
 * @method static Builder|Activity query()
 * @method static Builder|Activity whereActionableId($value)
 * @method static Builder|Activity whereActionableType($value)
 * @method static Builder|Activity whereBatchId($value)
 * @method static Builder|Activity whereChanges($value)
 * @method static Builder|Activity whereCreatedAt($value)
 * @method static Builder|Activity whereException($value)
 * @method static Builder|Activity whereFields($value)
 * @method static Builder|Activity whereId($value)
 * @method static Builder|Activity whereModelId($value)
 * @method static Builder|Activity whereModelType($value)
 * @method static Builder|Activity whereName($value)
 * @method static Builder|Activity whereOriginal($value)
 * @method static Builder|Activity whereStatus($value)
 * @method static Builder|Activity whereTargetId($value)
 * @method static Builder|Activity whereTargetType($value)
 * @method static Builder|Activity whereUpdatedAt($value)
 * @method static Builder|Activity whereUserId($value)
 * @mixin \Eloquent
 */
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

    final public function actionable(): MorphTo
    {
        return $this->morphTo();
    }
}
