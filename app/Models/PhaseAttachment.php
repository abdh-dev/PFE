<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PhaseAttachment
 *
 * @property int $id
 * @property int $phase_id
 * @property int $attachment_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PhaseAttachment newModelQuery()
 * @method static Builder|PhaseAttachment newQuery()
 * @method static Builder|PhaseAttachment query()
 * @method static Builder|PhaseAttachment whereAttachmentId($value)
 * @method static Builder|PhaseAttachment whereCreatedAt($value)
 * @method static Builder|PhaseAttachment whereId($value)
 * @method static Builder|PhaseAttachment wherePhaseId($value)
 * @method static Builder|PhaseAttachment whereUpdatedAt($value)
 * @mixin Eloquent
 */

class PhaseAttachment extends Model
{
    use HasFactory;
}
