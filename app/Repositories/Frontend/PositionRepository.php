<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Position;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;

/**
 * Class PositionRepository
 * @package App\Repositories\Frontend
 */
class PositionRepository extends BaseRepository implements IFrontendDataTableRepository
{
    use DataTableRepository;

    public function model()
    {
        return Position::class;
    }
}
