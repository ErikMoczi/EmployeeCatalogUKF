<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Title;

trait TitleTypeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function titles()
    {
        return $this->hasMany(Title::class);
    }
}