<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $position_id
 * @property int $departmen_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $full_name
 * @property Departman $departman
 * @property Position $position
 * @property EmployeeHasProfileType[] $employeeHasProfileTypes
 * @property Project[] $projects
 * @property Publication[] $publications
 * @property EmployeeHasTitle[] $employeeHasTitles
 */
class Employee extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee';

    /**
     * @var array
     */
    protected $fillable = ['position_id', 'departmen_id', 'first_name', 'middle_name', 'last_name', 'full_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departman()
    {
        return $this->belongsTo(Departman::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasProfileTypes()
    {
        return $this->hasMany(EmployeeHasProfileType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, EmployeeHasProject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publications()
    {
        return $this->belongsToMany(Publication::class, EmployeeHasProject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeHasTitles()
    {
        return $this->hasMany(EmployeeHasTitle::class);
    }
}
