<?php
namespace App\Models\Auth\Traits\Relationship;

use App\Models\Data\Employee;

trait UserRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
