<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Department;
use App\Models\Data\Employee;
use App\Models\Data\Faculty;
use App\Models\Data\Position;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class PositionRepository
 * @package App\Repositories\Frontend
 */
class PositionRepository extends BaseRepository implements IDataTableRepository, IFullTextSearch
{
    use DataTableRepository,
        FullTextSearch;

    public function model()
    {
        return Position::class;
    }

    /**
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function baseFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                'name AS display_value',
                'id'
            );
    }

    /**
     * @param array $facultyId
     * @return \Illuminate\Database\Query\Builder
     */
    public function injectFacultyFullTextSearch(array $facultyId)
    {
        return DB::query()
            ->selectRaw('1')
            ->from(Faculty::getTableName())
            ->join(Department::getTableName(), 'department.faculty_id', '=', 'faculty.id')
            ->join(Employee::getTableName(), 'employee.department_id', '=', 'department.id')
            ->whereIn('faculty.id', $facultyId)
            ->whereRaw('employee.position_id = position.id');
    }
}
