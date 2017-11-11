<?php

namespace App\Repositories\DataLoading;

use App\Models\UKF\Activity;
use App\Models\UKF\Employee;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ActivityRepository
 * @package App\Repositories\DataLoading
 */
class ActivityRepository extends BaseRepository
{
    public function model()
    {
        return Activity::class;
    }

    public function createWithEmployeeRelation(array $data, int $employeeId)
    {
        return DB::transaction(function () use ($data, $employeeId) {
            $activity = parent::create($data, false);
            $employee = Employee::find($employeeId);
            $activity->employees()->sync($employee);

            return $activity;
        });
    }
}
