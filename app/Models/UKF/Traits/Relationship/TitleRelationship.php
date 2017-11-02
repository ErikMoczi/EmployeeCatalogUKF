<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\EmployeeHasTitle;
use App\Models\UKF\TitleType;

trait TitleRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function titleType()
    {
        return $this->belongsTo(TitleType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasTitles()
    {
        return $this->hasMany(EmployeeHasTitle::class);
    }
}