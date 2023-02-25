<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $timeline
 * @property int $budget
 * @property int $resource_allocation
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project query()
 * @method static Builder|Project whereBudget($value)
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereDescription($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereName($value)
 * @method static Builder|Project whereRecourceAllocation($value)
 * @method static Builder|Project whereTimeline($value)
 * @method static Builder|Project whereUpdatedAt($value)
 * @method static Builder|Project whereUserId($value)
 * @property-read Collection<int, Phase> $phase
 * @property-read int|null $phase_count
 * @property-read User $user
 * @method static Builder|Project whereResourceAllocation($value)
 * @mixin Eloquent
 */

class Project extends Model
{
    protected $fillable = [
        "name",
        "description",
        "timeline",
        "budget",
        "resource_allocation"
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function phase(): HasMany {
        return $this->hasMany(Phase::class);
    }
}
