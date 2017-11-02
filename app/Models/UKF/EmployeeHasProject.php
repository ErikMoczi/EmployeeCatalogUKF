<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\EmployeeHasProjectRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $employee_id
 * @property int $project_id
 * @property Employee $employee
 * @property Project $project
 */
class EmployeeHasProject extends Model
{
    use EmployeeHasProjectRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee_has_project';

    /**
     * @var array
     */
    protected $fillable = [];
}
