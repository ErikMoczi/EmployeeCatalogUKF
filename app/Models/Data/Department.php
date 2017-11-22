<?php

namespace App\Models\Data;

use App\Models\Data\Traits\Relationship\DepartmentRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * @package App\Models\Data
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

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'N/A'
    ];
}
