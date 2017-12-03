<?php

namespace App\Models\Data\Traits\Method;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait FullTextSearchMethod
 * @package App\Models\Data\Traits\Method
 */
trait FullTextSearchMethod
{
    /**
     * @param Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFullTextSearch(Builder $query, string $search)
    {
        $columns = implode(',', $this->seachIndexColumn);

        $terms = $this->termBuilder($search);

        $termsBool = '+' . $terms->implode(' +');

        return $query->whereRaw('MATCH (' . $columns . ') AGAINST (? IN BOOLEAN MODE)', [$termsBool]);
    }

    /**
     * @param string $search
     * @return $this
     */
    public function termBuilder(string $search)
    {
        return collect(preg_split('/[\s,]+/', $search))
            ->map(function ($value, $key) {
                return $value . '*';
            });
    }
}
