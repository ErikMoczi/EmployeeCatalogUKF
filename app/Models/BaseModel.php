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
     * @return string
     */
    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}
