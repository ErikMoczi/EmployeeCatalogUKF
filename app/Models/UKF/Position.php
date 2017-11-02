<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Employee[] $employees
 */
class Position extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'position';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
