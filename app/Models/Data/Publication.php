<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\PublicationMethod;
use App\Models\Data\Traits\Relationship\PublicationRelationship;

/**
 * Class Publication
 * @package App\Models\Data
 */
class Publication extends BaseModel
{
    use PublicationRelationship,
        PublicationMethod;

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
        'type',
        'publisher',
        'pages',
        'year',
        'code'
    ];
}
