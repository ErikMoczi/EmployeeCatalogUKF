<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\DepartmentMethod;
use App\Models\Data\Traits\Method\FullTextSearchMethod;
use App\Models\Data\Traits\Relationship\DepartmentRelationship;

/**
 * Class Department
 * @package App\Models\Data
 */
class Department extends BaseModel
{
    use DepartmentRelationship,
        DepartmentMethod,
        FullTextSearchMethod;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'department';

    /**
     * @var array
     */
    protected $fillable = ['faculty_id', 'name', 'acronym'];

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'N/A'
    ];

    /**
     * @var array
     */
    protected $seachIndexColumn = [
        'name'
    ];
}
