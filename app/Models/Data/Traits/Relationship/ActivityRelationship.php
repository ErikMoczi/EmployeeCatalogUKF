<?php
namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasActivity;

trait ActivityRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasActivity::getTableName());
    }
}
