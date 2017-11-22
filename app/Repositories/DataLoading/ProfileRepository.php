<?php

namespace App\Repositories\DataLoading;

use App\Models\Data\Employee;
use App\Models\Data\ProfileType;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProfileRepository
 * @package App\Repositories\DataLoading
 */
class ProfileRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ProfileType::class;
    }

    /**
     * @param array $data
     * @param int $employeeId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function createMultipleWithEmployeeRelation(array $data, int $employeeId)
    {
        return DB::transaction(function () use ($data, $employeeId) {
            $profileTypes = parent::createMultiple($data['profile_type'], false);
            $employee = Employee::find($employeeId);

            foreach ($profileTypes as $profileType) {
                $profileType->employees()->attach($employee, ['value' => $data['profile_value'][$profileType->name]]);
            }

            return $profileTypes;
        });
    }
}
