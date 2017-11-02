<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\TitleTypeRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Title[] $titles
 */
class TitleType extends Model
{
    use TitleTypeRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'title_type';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
