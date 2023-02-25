<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\SalaryHistory
 *
 * @property int $id
 * @property string $salary
 * @property string $received_at
 * @property int $employed_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|SalaryHistory newModelQuery()
 * @method static Builder|SalaryHistory newQuery()
 * @method static Builder|SalaryHistory query()
 * @method static Builder|SalaryHistory whereCreatedAt($value)
 * @method static Builder|SalaryHistory whereEmployedBy($value)
 * @method static Builder|SalaryHistory whereId($value)
 * @method static Builder|SalaryHistory whereReceivedAt($value)
 * @method static Builder|SalaryHistory whereSalary($value)
 * @method static Builder|SalaryHistory whereUpdatedAt($value)
 * @property int $employee_id
 * @method static Builder|SalaryHistory whereEmployeeId($value)
 * @mixin Eloquent
 */

class SalaryHistory extends Model
{
    use HasFactory;
}
