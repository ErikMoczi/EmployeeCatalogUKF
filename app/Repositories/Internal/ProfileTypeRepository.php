<?php

namespace App\Repositories\Internal;

use App\Models\UKF\ProfileType;
use App\Repositories\BaseRepository;

/**
 * Class ProfileTypeRepository
 * @package App\Repositories\Internal
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