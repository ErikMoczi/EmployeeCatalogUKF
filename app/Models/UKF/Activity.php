<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ActivityRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $title
 * @property string $date
 * @property string $country
 * @property string $type
 * @property string $category
 * @property string $authors
 * @property Employee[] $employees
 */
class Activity extends Model
{
    use ActivityRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'activity';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id', 'title', 'date', 'country', 'type', 'category', 'authors'];
}
