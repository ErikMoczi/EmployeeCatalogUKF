<?php
namespace App\Models\UKF\Traits\Relationship;

use App\Models\UKF\Activity;
use App\Models\UKF\Author;

trait ActivityHasAuthorRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}