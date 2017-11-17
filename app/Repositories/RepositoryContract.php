<?php

namespace App\Repositories;

/**
 * Interface RepositoryContract
 * @package App\Repositories
 */
interface RepositoryContract
{
    public function all(array $columns = ['*']);

    public function count(): int;

    public function create(array $data, bool $forceCreate = true);

    public function createMultiple(array $data, bool $forceCreate = true);

    public function delete();

    public function deleteById($id): bool;

    public function deleteMultipleById(array $ids): int;

    public function first(array $columns = ['*']);

    public function get(array $columns = ['*']);

    public function getById($id, array $columns = ['*']);

    public function getByColumn($item, $column, array $columns = ['*']);

    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null);

    public function updateById($id, array $data, array $options = []);

    public function limit($limit);

    public function orderBy($column, $value);

    public function where($column, $value, $operator = '=');

    public function whereIn($column, $value);

    public function with($relations);
}
