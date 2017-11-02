<?php

namespace App\Models\UKF;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profileType()
    {
        return $this->belongsTo(ProfileType::class);
    }
}
