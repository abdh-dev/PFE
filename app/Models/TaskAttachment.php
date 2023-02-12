<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\TaskAttachment
 *
 * @property int $id
 * @property int $task_id
 * @property int $attachment_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|TaskAttachment newModelQuery()
 * @method static Builder|TaskAttachment newQuery()
 * @method static Builder|TaskAttachment query()
 * @method static Builder|TaskAttachment whereAttachmentId($value)
 * @method static Builder|TaskAttachment whereCreatedAt($value)
 * @method static Builder|TaskAttachment whereId($value)
 * @method static Builder|TaskAttachment whereTaskId($value)
 * @method static Builder|TaskAttachment whereUpdatedAt($value)
 * @mixin Eloquent
 */
class TaskAttachment extends Model
{
    use HasFactory;
}
