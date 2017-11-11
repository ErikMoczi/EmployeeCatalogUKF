<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Activity;
use App\Models\UKF\EmployeeHasActivity;
use App\Models\UKF\EmployeeHasProfileType;
use App\Models\UKF\EmployeeHasProject;
use App\Models\UKF\EmployeeHasPublication;
use App\Models\UKF\ProfileType;
use App\Models\UKF\Project;
use App\Models\UKF\Publication;

trait EmployeeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, EmployeeHasActivity::getTableName());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function profiles()
    {
        return $this->belongsToMany(ProfileType::class, EmployeeHasProfileType::getTableName())->withPivot('value');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, EmployeeHasProject::getTableName());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publications()
    {
        return $this->belongsToMany(Publication::class, EmployeeHasPublication::getTableName());
    }
}
