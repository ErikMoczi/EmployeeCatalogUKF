<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\FacultyRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $short
 * @property string $acronym
 * @property Department[] $departments
 */
class Faculty extends Model
{
    use FacultyRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'faculty';

    /**
     * @var array
     */
    protected $fillable = ['name', 'short', 'acronym'];
}
