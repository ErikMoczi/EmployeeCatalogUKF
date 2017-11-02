<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Publication;

trait PublisherRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}