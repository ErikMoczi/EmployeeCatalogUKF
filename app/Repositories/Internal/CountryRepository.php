<?php

namespace App\Repositories\Internal;


use App\Models\UKF\Country;
use App\Repositories\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories\Internal
 */
class CountryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Country::class;
    }
}