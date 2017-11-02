<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\PublisherRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class Publisher extends Model
{
    use PublisherRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publisher';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
