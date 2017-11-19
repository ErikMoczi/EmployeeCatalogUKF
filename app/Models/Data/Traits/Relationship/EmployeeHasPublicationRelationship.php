<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;
use App\Models\Data\Publication;

/**
 * Trait EmployeeHasPublicationRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait EmployeeHasPublicationRelationship
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
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
