<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\EmployeeHasProfileType;

trait ProfileTypeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasProfileTypes()
    {
        return $this->hasMany(EmployeeHasProfileType::class);
    }
}