<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Publication;
use App\Repositories\BaseRepository;

/**
 * Class PublicationRepository
 * @package App\Repositories\DataLoading
 */
class PublicationRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Publication::class;
    }
}
