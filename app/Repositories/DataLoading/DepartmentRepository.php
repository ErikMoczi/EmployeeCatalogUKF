<?php

namespace App\Repositories\DataLoading;


use App\Models\Data\Department;
use App\Models\Data\Faculty;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class DepartmentRepository
 * @package App\Repositories\DataLoading
 */
class DepartmentRepository extends BaseRepository
{
    public function model()
    {
        return Department::class;
    }

    /**
     * @param array $data
     * @param int $facultyId
     * @return Department
     */
    public function createWithFacultyRelation(array $data, int $facultyId)
    {
        if (strlen($data['name']) == 0) {
            $data = [
                'name' => $this->model->getAttribute('name'),
                'faculty_id' => Faculty::getDefaultRecord()->id
            ];
        } else {
            $data['faculty_id'] = $facultyId;
        }

        return DB::transaction(function () use ($data, $facultyId) {
            return parent::create($data, false);
        });
    }
}
