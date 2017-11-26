<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Faculty;
use App\Repositories\BaseRepository;

/**
 * Class FacultyRepository
 * @package App\Repositories\Frontend
 */
class FacultyRepository extends BaseRepository implements IFrontendDataTableRepository
{
    public function model()
    {
        return Faculty::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->withCount('employees', 'departments');
    }
}
