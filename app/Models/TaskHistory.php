<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\TaskHistory
 *
 * @property int $id
 * @property string $field_name
 * @property string $old_value
 * @property string $new_value
 * @property int $task_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|TaskHistory newModelQuery()
 * @method static Builder|TaskHistory newQuery()
 * @method static Builder|TaskHistory query()
 * @method static Builder|TaskHistory whereCreatedAt($value)
 * @method static Builder|TaskHistory whereFieldName($value)
 * @method static Builder|TaskHistory whereId($value)
 * @method static Builder|TaskHistory whereNewValue($value)
 * @method static Builder|TaskHistory whereOldValue($value)
 * @method static Builder|TaskHistory whereTaskId($value)
 * @method static Builder|TaskHistory whereUpdatedAt($value)
 * @mixin Eloquent
 */

class TaskHistory extends Model
{
    use HasFactory;
}
