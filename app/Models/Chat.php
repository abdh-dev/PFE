<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Chat
 *
 * @property int $id
 * @property string $message
 * @property string $sent_at
 * @property int $is_attached
 * @property int $user_id
 * @property int|null $task_id
 * @property int|null $phase_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Chat newModelQuery()
 * @method static Builder|Chat newQuery()
 * @method static Builder|Chat query()
 * @method static Builder|Chat whereCreatedAt($value)
 * @method static Builder|Chat whereId($value)
 * @method static Builder|Chat whereIsAttached($value)
 * @method static Builder|Chat whereMessage($value)
 * @method static Builder|Chat wherePhaseId($value)
 * @method static Builder|Chat whereSentAt($value)
 * @method static Builder|Chat whereTaskId($value)
 * @method static Builder|Chat whereUpdatedAt($value)
 * @method static Builder|Chat whereUserId($value)
 * @mixin \Eloquent
 */
class Chat extends Model
{
    use HasFactory;
}
