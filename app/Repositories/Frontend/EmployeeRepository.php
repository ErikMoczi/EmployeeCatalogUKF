<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasActivity;
use App\Models\Data\EmployeeHasProject;
use App\Models\Data\EmployeeHasPublication;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class EmployeeRepository
 * @package App\Repositories\Frontend
 */
class EmployeeRepository extends BaseRepository implements IFrontendDataTableRepository
{
    public function model()
    {
        return Employee::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->join('department', 'department.id', '=', 'employee.department_id')
            ->join('faculty', 'faculty.id', '=', 'department.faculty_id')
            ->select(
                'employee.*',
                'department.name AS department_name',
                'department.id AS department_id',
                'faculty.name AS faculty_name',
                'faculty.id AS faculty_id'
            )
            ->withCount('publications', 'projects', 'activities');
    }

    /**
     * @param int $count
     * @return \Illuminate\Support\Collection
     */
    public function getTopEmployees(int $count = 5)
    {
        $totalPublishings = DB::query()
            ->selectRaw('SUM(p.publishing_count) AS publishing_count')
            ->from(DB::raw('(' . $this->getPublishingsCount()->toSql() . ') p'))
            ->first('publishing_count');

        return $this->model
            ->selectRaw(
                'employee.id, employee.full_name, SUM(p.publishing_count) AS publishing_count, ROUND(SUM(p.publishing_count)/?*100, 3) AS publishing_percentage',
                [$totalPublishings->publishing_count]
            )
            ->leftJoin(
                DB::raw('(' . $this->getPublishingsCount()->toSql() . ') p'),
                function ($join) {
                    $join->on('employee.id', '=', 'p.employee_id');
                }
            )
            ->groupBy('employee.id', 'employee.full_name')
            ->orderBy('publishing_count', 'desc')
            ->limit($count)
            ->get();
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function getPublishingsCount()
    {
        $publications = DB::query()
            ->selectRaw('employee_id, COUNT(1) AS publishing_count, \'publication\' AS type')
            ->from(EmployeeHasPublication::getTableName())
            ->groupBy('employee_id');

        $projects = DB::query()
            ->selectRaw('employee_id, COUNT(1) AS publishing_count, \'project\' AS type')
            ->from(EmployeeHasProject::getTableName())
            ->groupBy('employee_id');

        $activities = DB::query()
            ->selectRaw('employee_id, COUNT(1) AS publishing_count, \'activity\' AS type')
            ->from(EmployeeHasActivity::getTableName())
            ->groupBy('employee_id');

        return $publications->unionAll($projects)->unionAll($activities);
    }
}
