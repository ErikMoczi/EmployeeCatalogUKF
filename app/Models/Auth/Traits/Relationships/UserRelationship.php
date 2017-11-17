<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Data\Employee;

/**
 * Trait UserRelationship
 * @package App\Models\Auth\Traits\Relationship
 */
trait UserRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
