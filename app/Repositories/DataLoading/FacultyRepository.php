<?php

namespace App\Repositories\DataLoading;

use App\Models\UKF\Faculty;
use App\Repositories\BaseRepository;

/**
 * Class FacultyRepository
 * @package App\Repositories\DataLoading
 */
class FacultyRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Faculty::class;
    }
}
