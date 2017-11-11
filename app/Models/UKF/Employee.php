<?php

namespace App\Models\UKF;

use App\Models\BaseModel;
use App\Models\UKF\Traits\Relationship\EmployeeRelationship;

/**
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $full_name
 * @property string $position
 * @property string $dep_name
 * @property string $dep_acronym
 * @property string $faculty_name
 * @property string $faculty_acronym
 * @property Activity[] $activities
 * @property EmployeeHasProfileType[] $employeeHasProfileTypes
 * @property Project[] $projects
 * @property Publication[] $publications
 */
class Employee extends BaseModel
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
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'full_name',
        'position',
        'dep_name',
        'dep_acronym',
        'faculty_name',
        'faculty_acronym'
    ];
}
