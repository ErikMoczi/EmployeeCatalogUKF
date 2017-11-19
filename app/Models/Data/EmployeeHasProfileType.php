<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\EmployeeHasProfileTypeRelationship;

/**
 * Class EmployeeHasProfileType
 * @package App\Models\Data
 */
class EmployeeHasProfileType extends BaseModel
{
    use EmployeeHasProfileTypeRelationship;

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
    protected $table = 'employee_has_profile_type';
    /**
     * @var array
     */
    protected $fillable = ['value'];
}
