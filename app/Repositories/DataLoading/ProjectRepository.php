<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Project;
use App\Repositories\BaseRepository;

/**
 * Class ProjectRepository
 * @package App\Repositories\DataLoading
 */
class ProjectRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Project::class;
    }
}
