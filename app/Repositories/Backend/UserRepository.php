<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Data\Employee;
use App\Repositories\BaseRepository;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Repositories\Backend
 */
class UserRepository extends BaseRepository implements IDataTableRepository
{
    public function model()
    {
        return User::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->leftJoin(Employee::getTableName(), 'employee.id', '=', 'user.employee_id')
            ->select(
                'user.id',
                'user.name',
                'user.email',
                'user.admin_flag',
                'user.created_at',
                'user.updated_at',
                'employee.id AS employee_id',
                'employee.full_name'
            );
    }

    /**
     * @param int $exceptId
     * @return \Illuminate\Support\Collection
     */
    public function getUnusedEmployees(int $exceptId = 0)
    {
        return DB::query()
            ->select(
                'employee.id',
                'employee.full_name'
            )
            ->from($this->model->getTable())
            ->rightJoin(Employee::getTableName(), 'employee.id', '=', 'user.employee_id')
            ->whereNull('user.employee_id')
            ->orWhere('employee.id', '=', $exceptId)
            ->get();
    }

    /**
     * @param int $id
     * @param $input
     * @return User
     * @throws GeneralException
     */
    public function updatePassword(int $id, $input): User
    {
        $user = $this->getById($id);
        $user->password = bcrypt($input['password']);

        if ($user->save()) {
            return $user;
        }

        throw new GeneralException('There was a problem changing this users password. Please try again.');
    }
}
