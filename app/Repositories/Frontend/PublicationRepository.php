<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Publication;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PublicationRepository
 * @package App\Repositories\Frontend
 */
class PublicationRepository extends BaseRepository
{
    public function model()
    {
        return Publication::class;
    }

    /**
     * @return Collection|static[]
     */
    public function getWithCountRelations()
    {
        return $this->model
            ->withCount('employees')
            ->get();
    }
}
