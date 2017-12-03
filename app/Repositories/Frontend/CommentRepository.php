<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Comment;
use App\Models\Data\Employee;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class CommentRepository
 * @package App\Repositories\Frontend
 */
class CommentRepository extends BaseRepository
{
    public function model()
    {
        return Comment::class;
    }

    /**
     * @param array $data
     * @param int $employeeId
     * @return Comment
     * @throws \Exception
     * @throws \Throwable
     */
    public function createWithEmployeeRelation(array $data, int $employeeId)
    {
        $data['employee_id'] = Employee::find($employeeId)->id;

        return DB::transaction(function () use ($data) {
            return parent::create($data, false);
        });
    }
}
