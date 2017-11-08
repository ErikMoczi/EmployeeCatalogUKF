<?php

namespace App\Repositories\DataLoading;

use App\Models\UKF\Publisher;
use App\Repositories\BaseRepository;

/**
 * Class PublisherRepository
 * @package App\Repositories\DataLoading
 */
class PublisherRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Publisher::class;
    }
}
