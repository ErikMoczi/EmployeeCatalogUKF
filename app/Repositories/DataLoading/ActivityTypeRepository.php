<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\ActivityType;
use App\Repositories\BaseRepository;

/**
 * Class ActivityTypeRepository
 * @package App\Repositories\DataLoading
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
