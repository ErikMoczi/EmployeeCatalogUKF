<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Faculty;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class FacultyRepository
 * @package App\Repositories\Frontend
 */
class FacultyRepository extends BaseRepository implements IDataTableRepository, IFullTextSearch
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
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function baseFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                'name AS display_value',
                'id'
            );
    }

    /**
     * @param array $facultyId
     * @return \Illuminate\Database\Query\Builder
     */
    public function injectFacultyFullTextSearch(array $facultyId)
    {
        return DB::query()
            ->selectRaw('1')
            ->from(Faculty::getTableName())
            ->whereIn('faculty.id', $facultyId)
            ->whereRaw('faculty.id = faculty.id');
    }
}
