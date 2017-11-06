<?php

namespace App\Repositories\Internal;


use App\Models\UKF\Position;
use App\Repositories\BaseRepository;

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