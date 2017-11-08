<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Author;
use App\Repositories\BaseRepository;

/**
 * Class AuthorRepository
 * @package App\Repositories\DataLoading
 */
class AuthorRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Author::class;
    }
}
