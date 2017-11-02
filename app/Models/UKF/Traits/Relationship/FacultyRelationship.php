<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Department;

trait FacultyRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}