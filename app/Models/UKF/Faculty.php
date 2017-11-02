<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $short
 * @property string $acronym
 * @property Departman[] $departmens
 */
class Faculty extends Model
{
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departmens()
    {
        return $this->hasMany(Departmen::class);
    }
}
