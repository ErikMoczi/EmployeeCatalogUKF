<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\EmployeeHasPublicationRelationship;

/**
 * @property int $employee_id
 * @property int $publication_id
 * @property Employee $employee
 * @property Publication $publication
 */
class EmployeeHasPublication extends BaseModel
{
    use EmployeeHasPublicationRelationship;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_has_publication';
    /**
     * @var array
     */
    protected $fillable = [];
}
