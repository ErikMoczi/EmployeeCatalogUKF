<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ActivityRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
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
     * @var array
     */
    protected $fillable = ['key', 'title', 'date', 'country', 'type', 'category', 'authors'];
}
