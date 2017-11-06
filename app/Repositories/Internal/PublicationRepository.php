<?php

namespace App\Repositories\Internal;


use App\Models\UKF\Publication;
use App\Repositories\BaseRepository;

/**
 * Class PublicationRepository
 * @package App\Repositories\Internal
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