<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Activity;
use App\Models\UKF\EmployeeHasActivity;
use App\Models\UKF\EmployeeHasProfileType;
use App\Models\UKF\EmployeeHasProject;
use App\Models\UKF\EmployeeHasPublication;
use App\Models\UKF\Project;
use App\Models\UKF\Publication;

trait EmployeeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, EmployeeHasActivity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasProfileTypes()
    {
        return $this->hasMany(EmployeeHasProfileType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, EmployeeHasProject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publications()
    {
        return $this->belongsToMany(Publication::class, EmployeeHasPublication::class);
    }
}
