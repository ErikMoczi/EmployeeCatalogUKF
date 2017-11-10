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
                'id' => $this->getIfEmptyNull($data['id']),
                'title' => $this->getIfEmptyNull($data['title']),
                'date' => $this->getIfEmptyNull($data['date']),
                'country' => $this->getIfEmptyNull($data['country']),
                'type' => $this->getIfEmptyNull($data['type']),
                'category' => $this->getIfEmptyNull($data['category']),
                'authors' => $this->getIfEmptyNull($data['authors'])
            ], $forceCreate);

            return $activity;
        });
    }
}
