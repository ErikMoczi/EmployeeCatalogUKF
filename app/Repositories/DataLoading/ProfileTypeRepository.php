<?php

namespace App\Repositories\DataLoading;

use App\Models\UKF\ProfileType;
use App\Repositories\BaseRepository;

/**
 * Class ProfileTypeRepository
 * @package App\Repositories\DataLoading
 */
class ProfileTypeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ProfileType::class;
    }
}
