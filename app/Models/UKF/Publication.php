<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PublicationRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $publisher_id
 * @property int $publication_type_id
 * @property string $ISBN
 * @property string $title
 * @property string $sub_titile
 * @property float $page
 * @property float $year
 * @property PublicationType $publicationType
 * @property Publisher $publisher
 * @property Employee[] $employees
 * @property Autor[] $autors
 */
class Publication extends Model
{
    use PublicationRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication';

    /**
     * @var array
     */
    protected $fillable = ['publisher_id', 'publication_type_id', 'ISBN', 'title', 'sub_titile', 'page', 'year'];
}
