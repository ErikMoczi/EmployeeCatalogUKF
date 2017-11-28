<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;


/**
 * Class StatisticsRepository
 * @package App\Repositories
 */
class MultipleRepository
{
    /**
     * @param string $tableName
     * @return \Illuminate\Database\Query\Builder
     */
    public function getTableCount(string $tableName)
    {
        return DB::query()
            ->selectRaw("COUNT(1) aggregate_count, '$tableName' AS table_name")
            ->from($tableName)
            ->groupBy('table_name');
    }
}
