<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;

/**
 * Trait PositionRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait PositionRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
