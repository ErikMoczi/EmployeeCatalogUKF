<?php

namespace App\Repositories\Internal;


use App\Models\UKF\PublicationType;
use App\Repositories\BaseRepository;

/**
 * Class PublicationTypeRepository
 * @package App\Repositories\Internal
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