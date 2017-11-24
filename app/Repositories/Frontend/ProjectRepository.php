<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Project;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ProjectRepository
 * @package App\Repositories\Frontend
 */
class ProjectRepository extends BaseRepository
{
    public function model()
    {
        return Project::class;
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
