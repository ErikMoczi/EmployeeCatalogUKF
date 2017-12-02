<?php

namespace App\Repositories\Frontend;


use App\Models\Data\EmployeeHasPublication;
use App\Models\Data\Publication;
use App\Repositories\BaseRepository;
use App\Repositories\Frontend\Traits\DataTableRepository;
use App\Repositories\Frontend\Traits\FullTextSearch;
use Illuminate\Support\Facades\DB;

/**
 * Class PublicationRepository
 * @package App\Repositories\Frontend
 */
class PublicationRepository extends BaseRepository implements IFrontendDataTableRepository, IFullTextSearch
{
    use DataTableRepository,
        FullTextSearch;

    public function model()
    {
        return Publication::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCodeFirstLetterCountStats()
    {
        return $this->categoryCountStats('SUBSTR(code, 1, 1)', 'code_transform')
            ->get();
    }

    /**
     * @param string $columnName
     * @param string|null $columnAlias
     * @return \Illuminate\Database\Query\Builder
     */
    public function categoryCountStats(string $columnName, string $columnAlias = null)
    {
        $columnAlias = $columnAlias ?: $columnName;

        $baseQuery = $this->model
            ->select(
                DB::raw($columnName . ' AS ' . $columnAlias),
                DB::raw('COUNT(1) AS employee_count'),
                DB::raw('COUNT(DISTINCT publication.id) AS publication_count')
            )
            ->leftJoin(EmployeeHasPublication::getTableName(), 'employee_has_publication.publication_id', '=', 'publication.id')
            ->groupBy($columnAlias);

        return DB::query()
            ->select(
                $columnAlias,
                'employee_count',
                'publication_count',
                DB::raw('employee_count/publication_count AS average_employee')
            )
            ->from(DB::raw('(' . $baseQuery->toSql() . ') d'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPagesCountStats()
    {
        return $this->categoryCountStats("CASE WHEN pages <=10 THEN 'max 10' WHEN pages <=100 THEN 'max 100' WHEN pages <=1000 THEN 'max 1000' ELSE 'more' END", 'pages_filtered')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getTypeCountStats()
    {
        return $this->categoryCountStats('type')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search)
    {
        return $this->fullTextSearch($search)
            ->select(
                DB::raw("CONCAT(title, ': ', COALESCE(sub_title, '')) AS display_value"),
                'id'
            )
            ->get();
    }
}
