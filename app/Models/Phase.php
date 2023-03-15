<?php

namespace App\Models;

use Database\Factories\PhaseFactory;
use Eloquent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Phase
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property int $project_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Phase newModelQuery()
 * @method static Builder|Phase newQuery()
 * @method static Builder|Phase query()
 * @method static Builder|Phase whereColor($value)
 * @method static Builder|Phase whereCreatedAt($value)
 * @method static Builder|Phase whereDescription($value)
 * @method static Builder|Phase whereId($value)
 * @method static Builder|Phase whereName($value)
 * @method static Builder|Phase whereProjectId($value)
 * @method static Builder|Phase whereUpdatedAt($value)
 * @property-read Project|null $project
 * @method static PhaseFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */

class Phase extends Model
{
    use HasFactory, BroadcastsEvents;

    protected $fillable = [
        "name",
        "description",
        "color"
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function broadcastOn($event): PrivateChannel {
        return new PrivateChannel("private.projects.{$this->project_id}.phases");
    }
}
