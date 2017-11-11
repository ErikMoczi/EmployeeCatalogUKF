<?php

namespace App\Models\UKF;

use App\Models\BaseModel;
use App\Models\UKF\Traits\Relationship\EmployeeHasPublicationRelationship;

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
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee_has_publication';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
