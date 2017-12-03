<?php

namespace App\Models\Data;

use App\Models\BaseModel;
use App\Models\Data\Traits\Method\CommentMethod;
use App\Models\Data\Traits\Relationship\CommentRelationship;

/**
 * Class Comment
 * @package App\Models\Data
 */
class Comment extends BaseModel
{
    use CommentRelationship,
        CommentMethod;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'comment', 'employee_id', 'approved'];
}
