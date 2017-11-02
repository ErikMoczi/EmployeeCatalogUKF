<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $employee_id
 * @property int $title_id
 * @property int $order
 * @property Employee $employee
 * @property Title $title
 */
class EmployeeHasTitle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employee_has_title';

    /**
     * @var array
     */
    protected $fillable = ['order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
