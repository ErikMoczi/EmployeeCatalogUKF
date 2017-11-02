<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Employee;
use App\Models\UKF\EmployeeHasProject;

trait ProjectRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasProject::class);
    }
}