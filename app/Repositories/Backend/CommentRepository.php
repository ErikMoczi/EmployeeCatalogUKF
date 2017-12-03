<?php

namespace App\Repositories\Backend;


use App\Models\Data\Comment;
use App\Repositories\BaseRepository;

/**
 * Class CommentRepository
 * @package App\Repositories\Backend
 */
class CommentRepository extends BaseRepository
{
    public function model()
    {
        return Comment::class;
    }

    /**
     * @return int
     */
    public function getNotApprovedCount(): int
    {
        return $this->model
            ->where('approved', '=', 0)
            ->count();
    }
}
