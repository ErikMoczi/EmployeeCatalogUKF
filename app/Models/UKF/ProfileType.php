<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ProfileTypeRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property EmployeeHasProfileType[] $employeeHasProfileTypes
 */
class ProfileType extends Model
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
