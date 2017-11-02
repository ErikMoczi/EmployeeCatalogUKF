<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Employee;
use App\Models\UKF\Faculty;

trait DepartmentRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}