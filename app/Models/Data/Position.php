<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\PositionMethod;
use App\Models\Data\Traits\Relationship\PositionRelationship;

/**
 * Class Position
 * @package App\Models\Data
 */
class Position extends BaseModel
{
    use PositionRelationship,
        PositionMethod;

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
