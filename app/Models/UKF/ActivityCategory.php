<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ActivityCategoryRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Activity[] $activities
 */
class ActivityCategory extends Model
{
    use ActivityCategoryRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'activity_category';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
