<?php


namespace App\Repositories\Frontend;


/**
 * Interface IFullTextSearch
 * @package App\Repositories\Frontend
 */
interface IFullTextSearch
{
    /**
     * @param string $search
     * @return \Illuminate\Support\Collection
     */
    public function getFullTextSearch(string $search);
}
