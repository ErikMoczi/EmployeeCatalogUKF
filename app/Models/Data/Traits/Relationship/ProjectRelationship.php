<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasProject;

/**
 * Trait ProjectRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait ProjectRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasProject::getTableName());
    }
}
