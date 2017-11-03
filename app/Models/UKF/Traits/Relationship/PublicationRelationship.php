<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Author;
use App\Models\UKF\Employee;
use App\Models\UKF\EmployeeHasPublication;
use App\Models\UKF\PublicationHasAuthor;
use App\Models\UKF\PublicationType;
use App\Models\UKF\Publisher;

trait PublicationRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publicationType()
    {
        return $this->belongsTo(PublicationType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasPublication::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, PublicationHasAuthor::class);
    }
}