<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PhaseAttachment
 *
 * @property int $id
 * @property int $phase_id
 * @property int $attachment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment whereAttachmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhaseAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhaseAttachment extends Model
{
    use HasFactory;
}
