<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\FullTextSearchMethod;
use App\Models\Data\Traits\Method\ProjectMethod;
use App\Models\Data\Traits\Relationship\ProjectRelationship;

/**
 * Class Project
 * @package App\Models\Data
 */
class Project extends BaseModel
{
    use ProjectRelationship,
        ProjectMethod,
        FullTextSearchMethod;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project';

    /**
     * @var array
     */
    protected $fillable = ['title', 'year_from', 'year_to', 'reg_number'];

    /**
     * @var array
     */
    protected $seachIndexColumn = [
        'title'
    ];
}
