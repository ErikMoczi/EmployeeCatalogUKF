<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\EmployeeHasActivityRelationship;

/**
 * Class EmployeeHasActivity
 * @package App\Models\Data
 */
class EmployeeHasActivity extends BaseModel
{
    use EmployeeHasActivityRelationship;

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
    protected $table = 'employee_has_activity';
    /**
     * @var array
     */
    protected $fillable = [];
}
