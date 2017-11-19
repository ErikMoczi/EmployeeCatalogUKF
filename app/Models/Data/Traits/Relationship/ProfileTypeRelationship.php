<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasProfileType;

/**
 * Trait ProfileTypeRelationship
 * @package App\Models\Data\Traits\Relationship
 */
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
