<?php

namespace App\Models\UKF;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $publication_id
 * @property int $autor_id
 * @property Autor $autor
 * @property Publication $publication
 */
class PublicationHasAutor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publication_has_autor';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
