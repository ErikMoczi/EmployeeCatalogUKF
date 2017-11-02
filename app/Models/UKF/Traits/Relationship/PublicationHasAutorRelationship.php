<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Autor;
use App\Models\UKF\Publication;

trait PublicationHasAutorRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}