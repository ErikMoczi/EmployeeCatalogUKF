<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Department;

/**
 * Trait FacultyRelationship
 * @package App\Models\Data\Traits\Relationship
 */
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
