<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Project;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectRepository
 * @package App\Repositories\DataLoading
 */
class ProjectRepository extends BaseRepository
{
    public function model()
    {
        return Project::class;
    }

    public function create(array $data, bool $forceCreate = false)
    {
        return DB::transaction(function () use ($data, $forceCreate) {
            $project = parent::create([
                'title' => $data['title'],
                'year_from' => $data['year_from'],
                'year_to' => $data['year_to'],
                'reg_number' => $data['reg_number']
            ], $forceCreate);

            return $project;
        });
    }
}
