<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Publication;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;

/**
 * Class PublicationRepository
 * @package App\Repositories\Frontend
 */
class PublicationRepository extends BaseRepository implements IFrontendDataTableRepository
{
    use DataTableRepository;

    public function model()
    {
        return Publication::class;
    }
}
