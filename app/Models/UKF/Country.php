<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\CountryRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Activity[] $activities
 */
class Country extends Model
{
    use CountryRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'country';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
