<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package App\Models
 */
abstract class BaseModel extends Model
{
    /**
     * @return mixed
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
