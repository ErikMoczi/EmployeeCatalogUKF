<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Department;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;

/**
 * Class DepartmentRepository
 * @package App\Repositories\Frontend
 */
class DepartmentRepository extends BaseRepository implements IFrontendDataTableRepository, IFullTextSearch
{
    use FullTextSearch;

    public function model()
    {
        return Department::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->join('faculty', 'faculty.id', '=', 'department.faculty_id')
            ->select(
                'department.*',
                'faculty.name AS faculty_name',
                'faculty.id AS faculty_id'
            )
            ->withCount('employees');
    }

    /**
     * @param string $search
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                'name AS display_value',
                'id'
            )
            ->get();
    }
}
