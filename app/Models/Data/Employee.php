<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\EmployeeMethod;
use App\Models\Data\Traits\Method\FullTextSearchMethod;
use App\Models\Data\Traits\Relationship\EmployeeRelationship;

/**
 * Class Employee
 * @package App\Models\Data
 */
class Employee extends BaseModel
{
    use EmployeeRelationship,
        EmployeeMethod,
        FullTextSearchMethod;

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
        'position_id',
        'department_id',
        'first_name',
        'middle_name',
        'last_name',
        'full_name'
    ];

    /**
     * @var array
     */
    protected $seachIndexColumn = [
        'first_name',
        'middle_name',
        'last_name'
    ];
}
