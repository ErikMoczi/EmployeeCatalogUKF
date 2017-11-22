<?php

namespace App\Models\Data;

use App\Models\Data\Traits\Relationship\FacultyRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Faculty
 * @package App\Models\Data
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
