<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Employee;

/**
 * Trait CommentRelationship
 * @package App\Models\Data\Traits\Relationship
 */
trait CommentRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
