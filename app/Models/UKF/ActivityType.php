<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ActivityTypeRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Activity[] $activities
 */
class ActivityType extends Model
{
    use ActivityTypeRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'activity_type';

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];
}
