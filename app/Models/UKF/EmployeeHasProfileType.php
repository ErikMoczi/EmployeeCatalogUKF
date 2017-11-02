<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\EmployeeHasProfileTypeRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $employee_id
 * @property int $profile_type_id
 * @property string $value
 * @property Employee $employee
 * @property ProfileType $profileType
 */
class EmployeeHasProfileType extends Model
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
}
