<?php

namespace App\Repositories\Frontend\Traits;


/**
 * Trait DataTableRepository
 * @package App\Repositories\Frontend\Traits
 */
trait DataTableRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable()
    {
        return $this->model
            ->withCount('employees');
    }
}
