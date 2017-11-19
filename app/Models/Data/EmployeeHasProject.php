<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\EmployeeHasProjectRelationship;

/**
 * Class EmployeeHasProject
 * @package App\Models\Data
 */
class EmployeeHasProject extends BaseModel
{
    use EmployeeHasProjectRelationship;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
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
