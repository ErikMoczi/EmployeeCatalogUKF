<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\EmployeeHasActivityRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $employee_id
 * @property string $activity_id
 * @property Activity $activity
 * @property Employee $employee
 */
class EmployeeHasActivity extends Model
{
    use EmployeeHasActivityRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee_has_activity';

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
