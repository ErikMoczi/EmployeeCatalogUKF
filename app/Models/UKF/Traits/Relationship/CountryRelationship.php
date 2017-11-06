<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Activity;

trait CountryRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}