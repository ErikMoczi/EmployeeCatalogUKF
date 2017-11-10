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
            $publication = parent::createOrGet([
                'ISBN' => $this->getIfEmptyNull($data['ISBN']),
                'title' => $this->getIfEmptyNull($data['title']),
                'sub_title' => $this->getIfEmptyNull($data['sub_title']),
                'authors' => $this->getIfEmptyNull($data['authors']),
                'type' => $this->getIfEmptyNull($data['type']),
                'publisher' => $this->getIfEmptyNull($data['publisher']),
                'pages' => $this->getIfEmptyNull($data['pages']),
                'year' => $this->getIfEmptyNull($data['year']),
                'code' => $this->getIfEmptyNull($data['code'])
            ], $forceCreate);

            return $publication;
        });
    }
}
