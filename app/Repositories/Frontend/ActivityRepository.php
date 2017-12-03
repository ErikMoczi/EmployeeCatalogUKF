<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Activity;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ActivityRepository
 * @package App\Repositories\Frontend
 */
class ActivityRepository extends BaseRepository implements IDataTableRepository, IFullTextSearch
{
    use DataTableRepository,
        FullTextSearch;

    public function model()
    {
        return Activity::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCountryCount()
    {
        return $this->model
            ->selectRaw('country, COUNT(1) AS aggregate')
            ->groupBy('country')
            ->orderBy('country')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getTypeCount()
    {
        return $this->model
            ->selectRaw('type, COUNT(1) AS aggregate')
            ->groupBy('type')
            ->orderBy('type')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCategoryCount()
    {
        return $this->model
            ->selectRaw('category, COUNT(1) AS aggregate')
            ->groupBy('category')
            ->orderBy('category')
            ->get();
    }

    /**
     * @param string $search
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                DB::raw("CONCAT(title, ': ', COALESCE(`key`, '')) AS display_value"),
                'id'
            )
            ->get();
    }
}
