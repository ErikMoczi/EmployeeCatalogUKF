<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Employee;
use App\Models\UKF\Title;

trait EmployeeHasTitleRelationship
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
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}