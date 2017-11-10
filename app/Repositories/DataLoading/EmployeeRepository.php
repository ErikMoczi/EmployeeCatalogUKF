<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Employee;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class EmployeeRepository
 * @package App\Repositories\DataLoading
 */
class EmployeeRepository extends BaseRepository
{
    public function model()
    {
        return Employee::class;
    }

    public function create(array $data, bool $forceCreate = false)
    {
        return DB::transaction(function () use ($data, $forceCreate) {
            $employee = parent::create([
                'id' => $this->getIfEmptyNull($data['id']),
                'first_name' => $this->getIfEmptyNull($data['first_name']),
                'middle_name' => $this->getIfEmptyNull($data['middle_name']),
                'last_name' => $this->getIfEmptyNull($data['last_name']),
                'full_name' => $this->getIfEmptyNull($data['full_name']),
                'position' => $this->getIfEmptyNull($data['position']),
                'dep_name' => $this->getIfEmptyNull($data['dep_name']),
                'dep_acronym' => $this->getIfEmptyNull($data['dep_acronym']),
                'faculty_name' => $this->getIfEmptyNull($data['faculty_name']),
                'faculty_acronym' => $this->getIfEmptyNull($data['faculty_acronym'])
            ], $forceCreate);

            return $employee;
        });
    }
}
