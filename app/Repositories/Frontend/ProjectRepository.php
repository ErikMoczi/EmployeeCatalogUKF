<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Project;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;

/**
 * Class ProjectRepository
 * @package App\Repositories\Frontend
 */
class ProjectRepository extends BaseRepository implements IFrontendDataTableRepository
{
    use DataTableRepository;

    public function model()
    {
        return Project::class;
    }
}
