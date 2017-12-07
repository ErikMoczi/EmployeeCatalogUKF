<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Activity;
use App\Models\Data\Department;
use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasActivity;
use App\Models\Data\Faculty;
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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function baseFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                DB::raw("CONCAT(title, ': ', COALESCE(`key`, '')) AS display_value"),
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
            ->join(EmployeeHasActivity::getTableName(), 'employee_has_activity.employee_id', '=', 'employee.id')
            ->whereIn('faculty.id', $facultyId)
            ->whereRaw('employee_has_activity.activity_id = activity.id');
    }
}
