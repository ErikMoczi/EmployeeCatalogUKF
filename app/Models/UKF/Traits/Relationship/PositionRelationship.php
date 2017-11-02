<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Employee;

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