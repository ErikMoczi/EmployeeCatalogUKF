<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Relationship\ProfileTypeRelationship;

/**
 * @property int $id
 * @property string $name
 * @property EmployeeHasProfileType[] $employeeHasProfileTypes
 */
class ProfileType extends BaseModel
{
    use ProfileTypeRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'profile_type';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
