<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Faculty;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;

/**
 * Class FacultyRepository
 * @package App\Repositories\Frontend
 */
class FacultyRepository extends BaseRepository implements IFrontendDataTableRepository, IFullTextSearch
{
    use FullTextSearch;

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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getDepartmentCount()
    {
        return $this->model
            ->withCount('departments')
            ->orderBy('name')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getEmployeeCount()
    {
        return $this->model
            ->withCount('employees')
            ->orderBy('name')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPositionCount()
    {
        return $this->model
            ->join('department', 'department.faculty_id', '=', 'faculty.id')
            ->join('employee', 'employee.department_id', '=', 'department.id')
            ->join('position', 'position.id', '=', 'employee.position_id')
            ->selectRaw('faculty.name AS faculty_name, position.name AS position_name, COUNT(1) AS aggregate')
            ->orderBy('faculty_name')
            ->groupBy('faculty_name', 'position_name')
            ->get();
    }

    /**
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
