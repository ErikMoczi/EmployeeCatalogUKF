<?php

namespace App\Repositories\Internal;


use App\Models\UKF\ActivityCategory;
use App\Repositories\BaseRepository;

/**
 * Class ActivityCategoryRepository
 * @package App\Repositories\Internal
 */
class ActivityCategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ActivityCategory::class;
    }
}