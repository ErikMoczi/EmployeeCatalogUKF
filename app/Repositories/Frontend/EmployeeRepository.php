<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Department;
use App\Models\Data\Employee;
use App\Models\Data\EmployeeHasActivity;
use App\Models\Data\EmployeeHasProject;
use App\Models\Data\EmployeeHasPublication;
use App\Models\Data\Faculty;
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
            ->from(DB::raw('(' . $this->publishingsCount()->toSql() . ') p'))
            ->first('publishing_count');

        return $this->model
            ->selectRaw(
                'employee.id, employee.full_name, SUM(p.publishing_count) AS publishing_count, ROUND(SUM(p.publishing_count)/?*100, 3) AS publishing_percentage',
                [$totalPublishings->publishing_count]
            )
            ->leftJoin(
                DB::raw('(' . $this->publishingsCount()->toSql() . ') p'),
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
    public function publishingsCount()
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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPublishingAgregateStats()
    {
        return DB::query()
            ->select(
                'type',
                DB::raw('MIN(aggregate) AS aggregate_min'),
                DB::raw('ROUND(SUM(aggregate)/COUNT(1), 2) AS aggregate_avg'),
                DB::raw('MAX(aggregate) AS aggregate_max')
            )
            ->from(
                DB::raw(
                    '(' . DB::query()
                        ->selectRaw('p.type, employee.id, COUNT(1) as aggregate')
                        ->from(Employee::getTableName())
                        ->join(
                            DB::raw('(' . $this->publishings()->toSql() . ') p'),
                            function ($join) {
                                $join->on('employee.id', '=', 'p.employee_id');
                            }
                        )
                        ->groupBy('employee.id', 'p.type')
                        ->toSql() . ') d'
                )
            )
            ->orderBy('type')
            ->groupBy('type')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function publishings()
    {
        $publications = DB::query()
            ->select(
                'employee_id',
                'publication_id AS publishing_id',
                DB::raw("'publication' AS type")
            )
            ->from(EmployeeHasPublication::getTableName());

        $projects = DB::query()
            ->select(
                'employee_id',
                'project_id AS publishing_id',
                DB::raw("'project' AS type")
            )
            ->from(EmployeeHasProject::getTableName());

        $activities = DB::query()
            ->select(
                'employee_id',
                'activity_id AS publishing_id',
                DB::raw("'activity' AS type")
            )
            ->from(EmployeeHasActivity::getTableName());

        return $publications->unionAll($projects)->unionAll($activities);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPublishingStats()
    {
        return DB::query()
            ->select(
                'faculty.name AS faculty_name',
                'p.type',
                'p.publishing_id'
            )
            ->from(Employee::getTableName())
            ->join(
                DB::raw('(' . $this->publishings()->toSql() . ') p'),
                function ($join) {
                    $join->on('employee.id', '=', 'p.employee_id');
                }
            )
            ->join(Department::getTableName(), 'department.id', '=', 'employee.department_id')
            ->rightJoin(Faculty::getTableName(), 'faculty.id', '=', 'department.faculty_id')
            ->groupBy('faculty_name', 'p.type', 'p.publishing_id')
            ->orderBy('faculty_name')
            ->get();
    }
}
