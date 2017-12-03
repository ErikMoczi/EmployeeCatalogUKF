<?php

namespace App\Repositories\DataLoading;


use App\Models\Data\Faculty;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class FacultyRepository
 * @package App\Repositories\DataLoading
 */
class FacultyRepository extends BaseRepository
{
    public function model()
    {
        return Faculty::class;
    }

    /**
     * @param array $data
     * @return Faculty
     * @throws \Exception
     * @throws \Throwable
     */
    public function createUnique(array $data)
    {
        if (strlen($data['name']) == 0) {
            $data = [
                'name' => $this->model->getAttribute('name')
            ];
        }

        return DB::transaction(function () use ($data) {
            return parent::create($data, false);
        });
    }
}
