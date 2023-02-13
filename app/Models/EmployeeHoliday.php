<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\EmployeeHoliday
 *
 * @property int $id
 * @property int $employee_id
 * @property int $holiday_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|EmployeeHoliday newModelQuery()
 * @method static Builder|EmployeeHoliday newQuery()
 * @method static Builder|EmployeeHoliday query()
 * @method static Builder|EmployeeHoliday whereCreatedAt($value)
 * @method static Builder|EmployeeHoliday whereEmployeeId($value)
 * @method static Builder|EmployeeHoliday whereHolidayId($value)
 * @method static Builder|EmployeeHoliday whereId($value)
 * @method static Builder|EmployeeHoliday whereUpdatedAt($value)
 * @mixin Eloquent
 */

class EmployeeHoliday extends Model
{
    use HasFactory;
}
