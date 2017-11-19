<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\Project;

/**
 * Trait EmployeeHasProjectRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait EmployeeHasProjectRelationship
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
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
