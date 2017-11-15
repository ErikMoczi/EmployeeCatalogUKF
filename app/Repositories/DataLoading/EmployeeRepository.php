<?php

namespace App\Repositories\DataLoading;


use App\Models\Data\Employee;
use App\Repositories\BaseRepository;

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
}
