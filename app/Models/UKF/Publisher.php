<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class Publisher extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publisher';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
