<?php

namespace App\Repositories\Internal;


use App\Models\UKF\Title;
use App\Repositories\BaseRepository;

/**
 * Class TitleRepository
 * @package App\Repositories\Internal
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