<?php

namespace App\Repositories\DataLoading;


use App\Models\Data\Position;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class PositionRepository
 * @package App\Repositories\DataLoading
 */
class PositionRepository extends BaseRepository
{
    public function model()
    {
        return Position::class;
    }

    /**
     * @param array $data
     * @return Position
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
