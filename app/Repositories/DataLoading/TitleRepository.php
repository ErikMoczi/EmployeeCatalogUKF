<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Title;
use App\Repositories\BaseRepository;

/**
 * Class TitleRepository
 * @package App\Repositories\DataLoading
 */
class TitleRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Title::class;
    }
}