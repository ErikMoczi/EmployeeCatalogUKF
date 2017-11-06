<?php

namespace App\Repositories\Internal;

use App\Models\UKF\Activity;
use App\Repositories\BaseRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories\Internal
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