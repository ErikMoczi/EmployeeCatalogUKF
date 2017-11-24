<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Employee;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class EmployeeRepository
 * @package App\Repositories\Frontend
 */
class EmployeeRepository extends BaseRepository
{
    public function model()
    {
        return Employee::class;
    }

    /**
     * @return Collection|static[]
     */
    public function getWithCountRelations()
    {
        return $this->model
            ->withCount('publications', 'projects', 'activities')
            ->get();
    }
}
