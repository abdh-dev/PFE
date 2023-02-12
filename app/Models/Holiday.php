<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Holiday
 *
 * @property int $id
 * @property string $name
 * @property string $start_at
 * @property string|null $end_at
 * @property string $pattern
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Holiday newModelQuery()
 * @method static Builder|Holiday newQuery()
 * @method static Builder|Holiday query()
 * @method static Builder|Holiday whereCreatedAt($value)
 * @method static Builder|Holiday whereEndAt($value)
 * @method static Builder|Holiday whereId($value)
 * @method static Builder|Holiday whereName($value)
 * @method static Builder|Holiday wherePattern($value)
 * @method static Builder|Holiday whereStartAt($value)
 * @method static Builder|Holiday whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Holiday extends Model
{
    use HasFactory;
}
