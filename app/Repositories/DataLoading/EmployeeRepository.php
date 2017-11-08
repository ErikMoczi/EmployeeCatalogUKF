<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories\DataLoading
 */
class EmployeeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Employee::class;
    }
}
