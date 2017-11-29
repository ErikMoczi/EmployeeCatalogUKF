<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Activity;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories\Frontend
 */
class ActivityRepository extends BaseRepository implements IFrontendDataTableRepository
{
    use DataTableRepository;

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
}
