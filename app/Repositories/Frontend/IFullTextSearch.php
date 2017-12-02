<?php


namespace App\Repositories\Frontend;


/**
 * Interface IFullTextSearch
 * @package App\Repositories\Frontend
 */
interface IFullTextSearch
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search);
}
