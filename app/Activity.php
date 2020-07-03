<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Activity
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Activitylog\Models\Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Activitylog\Models\Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Activitylog\Models\Activity inLog($logNames)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereActionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereActionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereChanges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereTargetType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereUserId($value)
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
