<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Publication;
use App\Models\UKF\PublicationHasAutor;

trait AutorRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publications()
    {
        return $this->belongsToMany(Publication::class, PublicationHasAutor::class);
    }
}