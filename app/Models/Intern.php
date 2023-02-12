<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Intern
 *
 * @property int $id
 * @property string $school
 * @property string $start_date
 * @property string|null $end_date
 * @property int $user_id
 * @property int $employee_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Intern newModelQuery()
 * @method static Builder|Intern newQuery()
 * @method static Builder|Intern query()
 * @method static Builder|Intern whereCreatedAt($value)
 * @method static Builder|Intern whereEmployeeId($value)
 * @method static Builder|Intern whereEndDate($value)
 * @method static Builder|Intern whereId($value)
 * @method static Builder|Intern whereSchool($value)
 * @method static Builder|Intern whereStartDate($value)
 * @method static Builder|Intern whereUpdatedAt($value)
 * @method static Builder|Intern whereUserId($value)
 * @mixin \Eloquent
 */
class Intern extends Model
{
    use HasFactory;
}
