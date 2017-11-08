<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\ActivityCategory;
use App\Repositories\BaseRepository;

/**
 * Class ActivityCategoryRepository
 * @package App\Repositories\DataLoading
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
