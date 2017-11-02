<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $publisher_id
 * @property int $publication_type_id
 * @property string $ISBN
 * @property string $title
 * @property string $sub_titile
 * @property float $page
 * @property float $year
 * @property PublicationType $publicationType
 * @property Publisher $publisher
 * @property Employee[] $employees
 * @property Autor[] $autors
 */
class Publication extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication';

    /**
     * @var array
     */
    protected $fillable = ['publisher_id', 'publication_type_id', 'ISBN', 'title', 'sub_titile', 'page', 'year'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publicationType()
    {
        return $this->belongsTo(PublicationType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, EmployeeHasPublication::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autors()
    {
        return $this->belongsToMany(Autor::class, PublicationHasAutor::class);
    }
}
