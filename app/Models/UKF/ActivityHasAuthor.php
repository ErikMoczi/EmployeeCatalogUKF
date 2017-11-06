<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ActivityHasAuthorRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $activity_id
 * @property int $author_id
 * @property Activity $activity
 * @property Author $author
 */
class ActivityHasAuthor extends Model
{
    use ActivityHasAuthorRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'activity_has_author';

    /**
     * @var array
     */
    protected $fillable = [];
}
