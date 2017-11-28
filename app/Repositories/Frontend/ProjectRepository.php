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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAverageDurationProject()
    {
        return $this->model
            ->selectRaw('year_to - year_from + 1 AS duration')
            ->get();
    }
}
