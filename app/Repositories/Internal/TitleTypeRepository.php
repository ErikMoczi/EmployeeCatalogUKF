<?php

namespace App\Repositories\Internal;


use App\Models\UKF\TitleType;
use App\Repositories\BaseRepository;

/**
 * Class TitleTypeRepository
 * @package App\Repositories\Internal
 */
class TitleTypeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return TitleType::class;
    }
}