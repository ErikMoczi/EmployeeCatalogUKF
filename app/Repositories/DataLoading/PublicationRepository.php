<?php

namespace App\Repositories\DataLoading;


use App\Models\UKF\Publication;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class PublicationRepository
 * @package App\Repositories\DataLoading
 */
class PublicationRepository extends BaseRepository
{
    public function model()
    {
        return Publication::class;
    }

    public function create(array $data, bool $forceCreate = false)
    {
        return DB::transaction(function () use ($data, $forceCreate) {
            $publication = parent::create([
                'ISBN' => $data['ISBN'],
                'title' => $data['title'],
                'sub_title' => $data['sub_title'],
                'authors' => $data['authors'],
                'type' => $data['type'],
                'publisher' => $data['publisher'],
                'pages' => $data['pages'],
                'year' => $data['year'],
                'code' => $data['code']
            ], $forceCreate);

            return $publication;
        });
    }
}
