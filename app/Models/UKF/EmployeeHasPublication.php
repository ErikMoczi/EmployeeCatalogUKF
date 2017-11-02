<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\EmployeeHasPublicationRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $employee_id
 * @property int $publication_id
 * @property Employee $employee
 * @property Publication $publication
 */
class EmployeeHasPublication extends Model
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
}
