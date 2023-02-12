<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Collaborates
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Collaborates newModelQuery()
 * @method static Builder|Collaborates newQuery()
 * @method static Builder|Collaborates query()
 * @method static Builder|Collaborates whereCreatedAt($value)
 * @method static Builder|Collaborates whereId($value)
 * @method static Builder|Collaborates whereTaskId($value)
 * @method static Builder|Collaborates whereUpdatedAt($value)
 * @method static Builder|Collaborates whereUserId($value)
 * @mixin \Eloquent
 */
class Collaborates extends Model
{
    use HasFactory;
}
