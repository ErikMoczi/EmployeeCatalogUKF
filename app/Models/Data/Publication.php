<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\PublicationRelationship;

/**
 * @property int $id
 * @property string $ISBN
 * @property string $title
 * @property string $sub_title
 * @property string $authors
 * @property string $type
 * @property string $publisher
 * @property float $pages
 * @property float $year
 * @property string $code
 * @property Employee[] $employees
 */
class Publication extends BaseModel
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
        'sub_title',
        'authors',
        'type',
        'publisher',
        'pages',
        'year',
        'code'
    ];
}
