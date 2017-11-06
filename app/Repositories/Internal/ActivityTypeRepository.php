<?php

namespace App\Repositories\Internal;


use App\Models\UKF\ActivityType;
use App\Repositories\BaseRepository;

/**
 * Class ActivityTypeRepository
 * @package App\Repositories\Internal
 */
class ActivityTypeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ActivityType::class;
    }
}