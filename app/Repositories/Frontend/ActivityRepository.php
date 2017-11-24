<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Activity;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ActivityRepository
 * @package App\Repositories\Frontend
 */
class ActivityRepository extends BaseRepository
{
    public function model()
    {
        return Activity::class;
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
