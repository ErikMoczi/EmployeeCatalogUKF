<?php

namespace App\Repositories\DataLoading;

use App\Models\UKF\Activity;
use App\Repositories\BaseRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories\DataLoading
 */
class ActivityRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Activity::class;
    }
}
