<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Publication[] $publications
 */
class PublicationType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication_type';

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
