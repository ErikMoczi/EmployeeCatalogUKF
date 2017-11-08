<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Country;
use App\Repositories\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories\DataLoading
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
