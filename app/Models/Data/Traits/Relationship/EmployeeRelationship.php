<?php
namespace App\Models\Data\Traits\Relationship;

use App\Models\Data\Activity;
use App\Models\Data\EmployeeHasActivity;
use App\Models\Data\EmployeeHasProfileType;
use App\Models\Data\EmployeeHasProject;
use App\Models\Data\EmployeeHasPublication;
use App\Models\Data\ProfileType;
use App\Models\Data\Project;
use App\Models\Data\Publication;

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
