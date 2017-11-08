<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\PublicationType;
use App\Repositories\BaseRepository;

/**
 * Class PublicationTypeRepository
 * @package App\Repositories\DataLoading
 */
class PublicationTypeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return PublicationType::class;
    }
}
