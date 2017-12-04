<?php

namespace App\Repositories\Backend;


use App\Models\Data\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class CommentRepository
 * @package App\Repositories\Backend
 */
class CommentRepository extends BaseRepository implements IDataTableRepository
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

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->leftJoin('employee', 'employee.id', '=', 'comment.employee_id')
            ->select(
                DB::raw("CONCAT(comment.email, ' - ', comment.name) AS name"),
                'comment.id',
                'comment.approved',
                'comment.created_at',
                'comment.employee_id',
                'employee.full_name'
            );
    }

    /**
     * @param int $id
     * @param bool $state
     * @return bool
     */
    public function approve(int $id, bool $state)
    {
        $comment = $this->getById($id);
        $comment->approved = $state;

        return $comment->save();
    }
}
