<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Department;
use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasProject;
use App\Models\Data\Faculty;
use App\Models\Data\Project;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectRepository
 * @package App\Repositories\Frontend
 */
class ProjectRepository extends BaseRepository implements IDataTableRepository, IFullTextSearch
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
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function baseFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                'title AS display_value',
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
            ->join(Department::getTableName(), 'department.faculty_id', '=', 'faculty.id')
            ->join(Employee::getTableName(), 'employee.department_id', '=', 'department.id')
            ->join(EmployeeHasProject::getTableName(), 'employee_has_project.employee_id', '=', 'employee.id')
            ->whereIn('faculty.id', $facultyId)
            ->whereRaw('employee_has_project.project_id = project.id');
    }
}
