<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\FacultyMethod;
use App\Models\Data\Traits\Method\FullTextSearchMethod;
use App\Models\Data\Traits\Relationship\FacultyRelationship;

/**
 * Class Faculty
 * @package App\Models\Data
 */
class Faculty extends BaseModel
{
    use FacultyRelationship,
        FacultyMethod,
        FullTextSearchMethod;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faculty';

    /**
     * @var array
     */
    protected $fillable = ['name', 'acronym'];

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
