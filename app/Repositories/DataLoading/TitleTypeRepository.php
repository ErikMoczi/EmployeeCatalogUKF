<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\TitleType;
use App\Repositories\BaseRepository;

/**
 * Class TitleTypeRepository
 * @package App\Repositories\DataLoading
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
