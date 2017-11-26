<?php

namespace App\Repositories;


/**
 * Interface IDataTableRepository
 * @package App\Repositories
 */
interface IDataTableRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getForDataTable();
}
