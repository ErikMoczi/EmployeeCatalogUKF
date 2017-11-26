<?php


namespace App\DataTables\Frontend;


use App\DataTables\BaseDataTable;

abstract class FrontendDataTable extends BaseDataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return parent::dataTable($query)
            ->addColumn('action', function ($item) {
                return '<a href="' . route($this->getRouteShow(), $item->id) . '" class="btn btn-info btn-xs">Detail</a>';
            })
            ->addColumn('employees_count', function ($item) {
                return '<span class="label label-warning">' . $item->employees_count . '</span>';
            })
            ->orderColumn('employees_count', 'employees_count $1')
            ->rawColumns(['employees_count', 'action']);
    }
}