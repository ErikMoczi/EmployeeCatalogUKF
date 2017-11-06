<?php

namespace App\Repositories\Internal;


use App\Models\UKF\Department;
use App\Repositories\BaseRepository;

/**
 * Class DepartmentRepository
 * @package App\Repositories\Internal
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