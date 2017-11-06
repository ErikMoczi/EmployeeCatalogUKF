<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ActivityRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $activity_type_id
 * @property int $country_id
 * @property int $activity_category_id
 * @property string $key
 * @property string $title
 * @property string $date
 * @property ActivityCategory $activityCategory
 * @property ActivityType $activityType
 * @property Country $country
 * @property Author[] $authors
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
    protected $fillable = ['activity_type_id', 'country_id', 'activity_category_id', 'key', 'title', 'date'];
}
