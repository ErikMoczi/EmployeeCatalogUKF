<?php

namespace App\Repositories\Frontend;

use App\Models\Data\Activity;
use App\Models\Data\Department;
use App\Models\Data\Employee;
use App\Models\Data\Faculty;
use App\Models\Data\Position;
use App\Models\Data\Project;
use App\Models\Data\Publication;
use App\Repositories\MultipleRepository;
use Illuminate\Support\Facades\DB;


/**
 * Class StatisticsRepository
 * @package App\Repositories\Frontend
 */
class StatisticsRepository extends MultipleRepository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getTableCounts()
    {
        return DB::query()
            ->from(DB::raw('(' . $this->getAllTableCount()->toSql() . ') d'))
            ->get();
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function getAllTableCount()
    {
        return $this->getTableCount(Employee::getTableName())
            ->unionAll($this->getTableCount(Publication::getTableName()))
            ->unionAll($this->getTableCount(Project::getTableName()))
            ->unionAll($this->getTableCount(Activity::getTableName()))
            ->unionAll($this->getTableCount(Department::getTableName()))
            ->unionAll($this->getTableCount(Faculty::getTableName()))
            ->unionAll($this->getTableCount(Position::getTableName()));
    }
}
