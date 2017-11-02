<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\TitleRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $title_type_id
 * @property string $name
 * @property TitleType $titleType
 * @property EmployeeHasTitle[] $employeeHasTitles
 */
class Title extends Model
{
    use TitleRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'title';

    /**
     * @var array
     */
    protected $fillable = ['title_type_id', 'name'];
}
