<?php

namespace App\Repositories\Internal;


use App\Models\UKF\Author;
use App\Repositories\BaseRepository;

/**
 * Class AuthorRepository
 * @package App\Repositories\Internal
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