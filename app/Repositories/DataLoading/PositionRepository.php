<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Position;
use App\Repositories\BaseRepository;

/**
 * Class PositionRepository
 * @package App\Repositories\DataLoading
 */
class PositionRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Position::class;
    }
}
