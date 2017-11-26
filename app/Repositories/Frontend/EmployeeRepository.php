<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Employee;
use App\Repositories\BaseRepository;

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
}
