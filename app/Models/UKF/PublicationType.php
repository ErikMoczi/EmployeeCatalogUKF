<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PublicationTypeRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class PublicationType extends Model
{
    use PublicationTypeRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication_type';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
