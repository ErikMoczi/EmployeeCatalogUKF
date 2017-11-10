<?php

namespace App\Repositories\DataLoading;

use App\Models\UKF\Activity;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ActivityRepository
 * @package App\Repositories\DataLoading
 */
class ActivityRepository extends BaseRepository
{
    public function model()
    {
        return Activity::class;
    }

    public function create(array $data, bool $forceCreate = false)
    {
        return DB::transaction(function () use ($data, $forceCreate) {
            $activity = parent::create([
                'id' => $data['id'],
                'title' => $data['title'],
                'date' => $data['date'],
                'country' => $data['country'],
                'type' => $data['type'],
                'category' => $data['category'],
                'authors' => $data['authors']
            ], $forceCreate);

            return $activity;
        });
    }
}
