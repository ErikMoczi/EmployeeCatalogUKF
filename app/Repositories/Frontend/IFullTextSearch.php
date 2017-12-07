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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function baseFullTextSearch(string $search);

    /**
     * @param array $facultyId
     * @return \Illuminate\Database\Query\Builder
     */
    public function injectFacultyFullTextSearch(array $facultyId);
}
