<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Activity;
use App\Models\Data\Employee;

/**
 * Trait EmployeeHasActivityRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait EmployeeHasActivityRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
