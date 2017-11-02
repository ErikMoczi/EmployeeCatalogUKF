<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\EmployeeRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $position_id
 * @property int $department_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $full_name
 * @property Department $department
 * @property Position $position
 * @property EmployeeHasProfileType[] $employeeHasProfileTypes
 * @property Project[] $projects
 * @property Publication[] $publications
 * @property EmployeeHasTitle[] $employeeHasTitles
 */
class Employee extends Model
{
    use EmployeeRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee';

    /**
     * @var array
     */
    protected $fillable = ['position_id', 'department_id', 'first_name', 'middle_name', 'last_name', 'full_name'];
}
