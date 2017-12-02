<?php

namespace App\Repositories\Frontend;


use App\Models\Data\Position;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;

/**
 * Class PositionRepository
 * @package App\Repositories\Frontend
 */
class PositionRepository extends BaseRepository implements IFrontendDataTableRepository, IFullTextSearch
{
    use DataTableRepository,
        FullTextSearch;

    public function model()
    {
        return Position::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                'name AS display_value',
                'id'
            )
            ->get();
    }
}
