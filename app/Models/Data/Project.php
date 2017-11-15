<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\ProjectRelationship;

/**
 * @property int $id
 * @property string $title
 * @property float $year_from
 * @property float $year_to
 * @property string $reg_number
 * @property Employee[] $employees
 */
class Project extends BaseModel
{
    use ProjectRelationship;

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
}
