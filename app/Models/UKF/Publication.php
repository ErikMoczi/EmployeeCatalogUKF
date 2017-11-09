<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PublicationRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $ISBN
 * @property string $title
 * @property string $sub_titile
 * @property string $authors
 * @property string $type
 * @property string $publisher
 * @property float $pages
 * @property float $year
 * @property string $code
 * @property Employee[] $employees
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
    protected $fillable = [
        'ISBN',
        'title',
        'sub_titile',
        'authors',
        'type',
        'publisher',
        'pages',
        'year',
        'code'
    ];
}
