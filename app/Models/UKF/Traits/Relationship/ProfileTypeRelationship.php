<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Employee;
use App\Models\UKF\EmployeeHasProfileType;

trait ProfileTypeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasProfileType::getTableName())->withPivot('value');
    }
}
