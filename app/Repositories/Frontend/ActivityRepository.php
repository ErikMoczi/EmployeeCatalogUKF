<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Activity;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;

/**
 * Class ActivityRepository
 * @package App\Repositories\Frontend
 */
class ActivityRepository extends BaseRepository implements IFrontendDataTableRepository
{
    use DataTableRepository;

    public function model()
    {
        return Activity::class;
    }
}
