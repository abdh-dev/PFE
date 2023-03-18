<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $status
 * @property int $priority
 * @property string $estimated_time
 * @property int $bonus
 * @property int $penalty
 * @property string $start_date
 * @property string $due_date
 * @property string $completion_date
 * @property string $custom_fields
 * @property int $created_by
 * @property int $updated_by
 * @property int $depends_on
 * @property int $subtask_of
 * @property int $phase_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereBonus($value)
 * @method static Builder|Task whereCompletionDate($value)
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereCreatedBy($value)
 * @method static Builder|Task whereCustomFields($value)
 * @method static Builder|Task whereDependsOn($value)
 * @method static Builder|Task whereDescription($value)
 * @method static Builder|Task whereDueDate($value)
 * @method static Builder|Task whereEstimatedTime($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task wherePenalty($value)
 * @method static Builder|Task wherePhaseId($value)
 * @method static Builder|Task wherePriority($value)
 * @method static Builder|Task whereStartDate($value)
 * @method static Builder|Task whereStatus($value)
 * @method static Builder|Task whereSubtaskOf($value)
 * @method static Builder|Task whereTitle($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @method static Builder|Task whereUpdatedBy($value)
 * @mixin Eloquent
 */

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "status",
        "priority",
        "estimated_time",
        "bonus",
        "penalty",
        "start_date",
        "due_date",
        "completion_date",
        "custom_fields",
        "created_by",
    ];

    protected $casts = [
        "custom_fields" => "array",
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function phase(): BelongsTo {
        return $this->belongsTo(Phase::class);
    }
}
