<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Activity;
use App\Models\UKF\Employee;

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