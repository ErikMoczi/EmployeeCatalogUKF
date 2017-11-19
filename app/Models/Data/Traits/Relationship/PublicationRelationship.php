<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasPublication;

/**
 * Trait PublicationRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait PublicationRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasPublication::getTableName());
    }
}
