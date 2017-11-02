<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\EmployeeHasTitleRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $employee_id
 * @property int $title_id
 * @property int $order
 * @property Employee $employee
 * @property Title $title
 */
class EmployeeHasTitle extends Model
{
    use EmployeeHasTitleRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee_has_title';

    /**
     * @var array
     */
    protected $fillable = ['order'];
}
