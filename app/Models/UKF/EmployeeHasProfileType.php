<?php

namespace App\Models\UKF;

use App\Models\BaseModel;
use App\Models\UKF\Traits\Relationship\EmployeeHasProfileTypeRelationship;

/**
 * @property int $employee_id
 * @property int $profile_type_id
 * @property string $value
 * @property Employee $employee
 * @property ProfileType $profileType
 */
class EmployeeHasProfileType extends BaseModel
{
    use EmployeeHasProfileTypeRelationship;

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

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
