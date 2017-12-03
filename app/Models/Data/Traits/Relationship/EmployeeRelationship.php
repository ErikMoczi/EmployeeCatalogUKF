<?php

namespace App\Models\Data\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Data\Activity;
use App\Models\Data\Comment;
use App\Models\Data\Department;
use App\Models\Data\EmployeeHasActivity;
use App\Models\Data\EmployeeHasProfileType;
use App\Models\Data\EmployeeHasProject;
use App\Models\Data\EmployeeHasPublication;
use App\Models\Data\Position;
use App\Models\Data\ProfileType;
use App\Models\Data\Project;
use App\Models\Data\Publication;

/**
 * Trait EmployeeRelationship
 * @package App\Models\Data\Traits\Relationship
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->department()
            ->join('faculty', 'faculty.id', '=', 'department.faculty_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvedComments()
    {
        return $this->hasMany(Comment::class)
            ->where('approved', '=', 1);
    }
}
