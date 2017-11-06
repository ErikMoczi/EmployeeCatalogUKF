<?php

namespace App\Repositories\Internal;

use App\Models\UKF\Publisher;
use App\Repositories\BaseRepository;

/**
 * Class PublisherRepository
 * @package App\Repositories\Internal
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