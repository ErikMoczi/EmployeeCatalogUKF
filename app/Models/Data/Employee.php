<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\EmployeeRelationship;

/**
 * Class Employee
 * @package App\Models\Data
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
