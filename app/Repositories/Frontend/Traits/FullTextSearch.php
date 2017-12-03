<?php

namespace App\Repositories\Frontend\Traits;


/**
 * Trait FullTextSearch
 * @package App\Repositories\Frontend\Traits
 */
trait FullTextSearch
{
    /**
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function fullTextSearch(string $search)
    {
        return $this->model
            ->fullTextSearch($search);
    }
}
