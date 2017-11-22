<?php

namespace App\Repositories\DataLoading;


use App\Models\Data\Employee;
use App\Models\Data\Publication;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class PublicationRepository
 * @package App\Repositories\DataLoading
 */
class PublicationRepository extends BaseRepository
{
    public function model()
    {
        return Publication::class;
    }

    /**
     * @param array $data
     * @param int $employeeId
     * @return Publication
     */
    public function createWithEmployeeRelation(array $data, int $employeeId)
    {
        return DB::transaction(function () use ($data, $employeeId) {
            $publication = parent::create($data, false);
            $employee = Employee::find($employeeId);
            $publication->employees()->sync($employee, false);

            return $publication;
        });
    }
}
