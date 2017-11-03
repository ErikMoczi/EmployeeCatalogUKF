<?php

namespace App\Models\UKF;

use App\Models\UKF\Traits\Relationship\AuthorRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class Author extends Model
{
    use AuthorRelationship;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'author';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
