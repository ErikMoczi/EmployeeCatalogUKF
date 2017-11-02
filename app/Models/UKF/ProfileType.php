<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property EmployeeHasProfileType[] $employeeHasProfileTypes
 */
class ProfileType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'profile_type';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasProfileTypes()
    {
        return $this->hasMany(EmployeeHasProfileType::class);
    }
}
