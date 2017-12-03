<?php

namespace App\Repositories\DataLoading;


use App\Models\Data\Employee;
use App\Models\Data\Project;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectRepository
 * @package App\Repositories\DataLoading
 */
class ProjectRepository extends BaseRepository
{
    public function model()
    {
        return Project::class;
    }

    /**
     * @param array $data
     * @param int $employeeId
     * @return Project
     * @throws \Exception
     * @throws \Throwable
     */
    public function createWithEmployeeRelation(array $data, int $employeeId)
    {
        return DB::transaction(function () use ($data, $employeeId) {
            $project = parent::create($data, false);
            $employee = Employee::find($employeeId);
            $project->employees()->sync($employee, false);

            return $project;
        });
    }
}
