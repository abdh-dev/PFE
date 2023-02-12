<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Absence
 *
 * @property int $id
 * @property string $date
 * @property int $length
 * @property string $cause
 * @property int $employee_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Absence newModelQuery()
 * @method static Builder|Absence newQuery()
 * @method static Builder|Absence query()
 * @method static Builder|Absence whereCause($value)
 * @method static Builder|Absence whereCreatedAt($value)
 * @method static Builder|Absence whereDate($value)
 * @method static Builder|Absence whereEmployeeId($value)
 * @method static Builder|Absence whereId($value)
 * @method static Builder|Absence whereLength($value)
 * @method static Builder|Absence whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Absence extends Model
{
    use HasFactory;
}
