<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\ActivityCategory;
use App\Models\UKF\ActivityHasAuthor;
use App\Models\UKF\ActivityType;
use App\Models\UKF\Author;
use App\Models\UKF\Country;
use App\Models\UKF\Employee;
use App\Models\UKF\EmployeeHasActivity;

trait ActivityRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activityCategory()
    {
        return $this->belongsTo(ActivityCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, ActivityHasAuthor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasActivity::class);
    }
}