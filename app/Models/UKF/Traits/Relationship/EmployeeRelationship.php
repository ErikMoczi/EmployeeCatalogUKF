<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Department;
use App\Models\UKF\EmployeeHasProfileType;
use App\Models\UKF\EmployeeHasProject;
use App\Models\UKF\EmployeeHasTitle;
use App\Models\UKF\Position;
use App\Models\UKF\Project;
use App\Models\UKF\Publication;

trait EmployeeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
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
        return $this->belongsToMany(Publication::class, EmployeeHasProject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasTitles()
    {
        return $this->hasMany(EmployeeHasTitle::class);
    }
}