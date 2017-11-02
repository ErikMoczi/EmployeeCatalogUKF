<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $title_type_id
 * @property string $name
 * @property TitleType $titleType
 * @property EmployeeHasTitle[] $employeeHasTitles
 */
class Title extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'title';

    /**
     * @var array
     */
    protected $fillable = ['title_type_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function titleType()
    {
        return $this->belongsTo(TitleType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasTitles()
    {
        return $this->hasMany(EmployeeHasTitle::class);
    }
}
