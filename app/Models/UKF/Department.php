<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\DepartmentRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $faculty_id
 * @property string $name
 * @property string $acronym
 * @property Faculty $faculty
 * @property Employee[] $employees
 */
class Department extends Model
{
    use DepartmentRelationship;

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
}
