<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Title[] $titles
 */
class TitleType extends Model
{
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function titles()
    {
        return $this->hasMany(Title::class);
    }
}
