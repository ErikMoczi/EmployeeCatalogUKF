<?php

namespace App\Repositories\Backend;


use App\Models\Data\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories\Backend
 */
class EmployeeRepository extends BaseRepository
{
    public function model()
    {
        return Employee::class;
    }
}
