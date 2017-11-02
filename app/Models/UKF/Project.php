<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\ProjectRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property float $year_from
 * @property float $year_to
 * @property string $reg_number
 * @property Employee[] $employees
 */
class Project extends Model
{
    use ProjectRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'project';

    /**
     * @var array
     */
    protected $fillable = ['title', 'year_from', 'year_to', 'reg_number'];
}
