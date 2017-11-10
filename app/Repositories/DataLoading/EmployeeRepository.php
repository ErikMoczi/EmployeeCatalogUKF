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
                'id' =>  $data['id'],
                'first_name' =>  $data['first_name'],
                'middle_name' =>  $data['middle_name'],
                'last_name' =>  $data['last_name'],
                'full_name' =>  $data['full_name'],
                'position' =>  $data['position'],
                'dep_name' =>  $data['dep_name'],
                'dep_acronym' =>  $data['dep_acronym'],
                'faculty_name' =>  $data['faculty_name'],
                'faculty_acronym' =>  $data['faculty_acronym']
            ], $forceCreate);

            return $employee;
        });
    }
}
