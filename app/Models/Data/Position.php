<?php

namespace App\Models\Data;

use App\Models\Data\Traits\Relationship\PositionRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 * @package App\Models\Data
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

    /**
     * @var array
     */
    protected $attributes = [
        'name' => 'N/A'
    ];
}
