<?php

namespace App\DataTables;

use App\Repositories\IDataTableRepository;
use Yajra\DataTables\Services\DataTable;


/**
 * Class BaseDataTable
 * @package App\DataTables
 */
abstract class BaseDataTable extends DataTable
{
    /**
     * @var IDataTableRepository
     */
    protected $repository;

    /**
     * BaseDataTable constructor.
     * @param IDataTableRepository $repository
     */
    public function __construct(IDataTableRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addIndexColumn()
            ->setTotalRecords($query->count());
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes($this->repository->getForDataTable());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->addTableClass('table table-hover table-fixed')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected abstract function getColumns(): array;

    /**
     * @return string
     */
    protected abstract function getRouteShow(): string;
}