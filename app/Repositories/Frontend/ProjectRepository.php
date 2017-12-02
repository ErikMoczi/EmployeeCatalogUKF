<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Project;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;

/**
 * Class ProjectRepository
 * @package App\Repositories\Frontend
 */
class ProjectRepository extends BaseRepository implements IFrontendDataTableRepository, IFullTextSearch
{
    use DataTableRepository,
        FullTextSearch;

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
            ->selectRaw('CONCAT(year_to - year_from + 1, \' year(s)\') AS duration, COUNT(1) aggregate')
            ->groupBy('duration')
            ->orderBy('duration')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getYearToCount()
    {
        return $this->model
            ->selectRaw('year_to, COUNT(1) AS aggregate')
            ->groupBy('year_to')
            ->orderBy('year_to')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getYearFromCount()
    {
        return $this->model
            ->selectRaw('year_from, COUNT(1) AS aggregate')
            ->groupBy('year_from')
            ->orderBy('year_from')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                'title AS display_value',
                'id'
            )
            ->get();
    }
}
