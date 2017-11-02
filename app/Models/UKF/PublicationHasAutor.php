<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PublicationHasAutorRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $publication_id
 * @property int $autor_id
 * @property Autor $autor
 * @property Publication $publication
 */
class PublicationHasAutor extends Model
{
    use PublicationHasAutorRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication_has_autor';

    /**
     * @var array
     */
    protected $fillable = [];
}
