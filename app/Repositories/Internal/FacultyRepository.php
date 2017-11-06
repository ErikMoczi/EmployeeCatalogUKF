<?php

namespace App\Repositories\Internal;

use App\Models\UKF\Faculty;
use App\Repositories\BaseRepository;

/**
 * Class FacultyRepository
 * @package App\Repositories\Internal
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