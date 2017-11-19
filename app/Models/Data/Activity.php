<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\ActivityRelationship;

/**
 * Class Activity
 * @package App\Models\Data
 */
class Activity extends BaseModel
{
    use ActivityRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activity';

    /**
     * @var array
     */
    protected $fillable = ['key', 'title', 'date', 'country', 'type', 'category', 'authors'];
}
