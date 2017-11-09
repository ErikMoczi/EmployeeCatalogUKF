<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Employee;
use App\Models\UKF\Project;

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
