<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PublicationHasAuthorRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $publication_id
 * @property int $author_id
 * @property Author $author
 * @property Publication $publication
 */
class PublicationHasAuthor extends Model
{
    use PublicationHasAuthorRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication_has_author';

    /**
     * @var array
     */
    protected $fillable = [];
}
