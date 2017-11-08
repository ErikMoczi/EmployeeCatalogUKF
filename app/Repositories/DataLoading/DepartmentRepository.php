<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Department;
use App\Repositories\BaseRepository;

/**
 * Class DepartmentRepository
 * @package App\Repositories\DataLoading
 */
class DepartmentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Department::class;
    }
}
