<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Department;
use App\Models\Data\Employee;

/**
 * Trait FacultyRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait FacultyRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasManyThrough
     */
    public function employees()
    {
        return $this->hasManyThrough(Employee::class, Department::class);
    }
}
