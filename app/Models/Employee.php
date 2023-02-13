<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $start_date
 * @property string|null $end_date
 * @property int $salary
 * @property int $user_id
 * @property int $employed_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Employee newModelQuery()
 * @method static Builder|Employee newQuery()
 * @method static Builder|Employee query()
 * @method static Builder|Employee whereCreatedAt($value)
 * @method static Builder|Employee whereEmployedBy($value)
 * @method static Builder|Employee whereEndDate($value)
 * @method static Builder|Employee whereId($value)
 * @method static Builder|Employee whereSalary($value)
 * @method static Builder|Employee whereStartDate($value)
 * @method static Builder|Employee whereUpdatedAt($value)
 * @method static Builder|Employee whereUserId($value)
 * @mixin Eloquent
 */

class Employee extends Model
{
    use HasFactory;
}
