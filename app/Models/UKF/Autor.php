<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class Autor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'autor';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publications()
    {
        return $this->belongsToMany(Publication::class, PublicationHasAutor::class);
    }
}
