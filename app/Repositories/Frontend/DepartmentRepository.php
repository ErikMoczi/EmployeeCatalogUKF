<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Department;
use App\Models\Data\Faculty;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class DepartmentRepository
 * @package App\Repositories\Frontend
 */
class DepartmentRepository extends BaseRepository implements IDataTableRepository, IFullTextSearch
{
    use FullTextSearch;

    public function model()
    {
        return Department::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->join('faculty', 'faculty.id', '=', 'department.faculty_id')
            ->select(
                'department.*',
                'faculty.name AS faculty_name',
                'faculty.id AS faculty_id'
            )
            ->withCount('employees');
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
            ->whereIn('faculty.id', $facultyId)
            ->whereRaw('faculty.id = department.faculty_id');
    }
}
