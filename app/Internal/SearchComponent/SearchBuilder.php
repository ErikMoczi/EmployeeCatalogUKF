<?php

namespace App\Internal\SearchComponent;

use App\Repositories\Frontend\IFullTextSearch;

/**
 * Class SearchBuilder
 * @package App\Internal\SearchComponent
 */
class SearchBuilder
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $queryBuilder;

    /**
     * @var IFullTextSearch
     */
    private $fullTextSearch;

    /**
     * SearchBuilder constructor.
     * @param IFullTextSearch $fullTextSearch
     * @param string $search
     */
    public function __construct(IFullTextSearch $fullTextSearch, string $search)
    {
        $this->queryBuilder = $fullTextSearch->baseFullTextSearch($search);
        $this->fullTextSearch = $fullTextSearch;
    }

    /**
     * @param array $facultyId
     */
    public function injectFaculty(array $facultyId)
    {
        $this->queryBuilder
            ->addWhereExistsQuery($this->fullTextSearch->injectFacultyFullTextSearch($facultyId));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get()
    {
        return $this->queryBuilder
            ->get();
    }
}
