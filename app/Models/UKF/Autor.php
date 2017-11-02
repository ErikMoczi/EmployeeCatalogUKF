<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\AutorRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class Autor extends Model
{
    use AutorRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'autor';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
