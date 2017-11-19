<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\ProfileType;

/**
 * Trait EmployeeHasProfileTypeRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait EmployeeHasProfileTypeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profileType()
    {
        return $this->belongsTo(ProfileType::class);
    }
}
