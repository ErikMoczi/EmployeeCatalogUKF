<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Author;
use App\Models\UKF\Publication;

trait PublicationHasAuthorRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}