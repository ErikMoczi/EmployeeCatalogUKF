<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\ProfileTypeMethod;
use App\Models\Data\Traits\Relationship\ProfileTypeRelationship;

/**
 * Class ProfileType
 * @package App\Models\Data
 */
class ProfileType extends BaseModel
{
    use ProfileTypeRelationship,
        ProfileTypeMethod;

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
