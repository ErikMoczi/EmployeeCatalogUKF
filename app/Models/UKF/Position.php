<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PositionRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Employee[] $employees
 */
class Position extends Model
{
    use PositionRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'position';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
