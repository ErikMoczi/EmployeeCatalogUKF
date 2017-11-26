<?php

namespace App\DataTables\Frontend;
use App\DataTables\BaseDataTable;

/**
 * Class FacultyDataTable
 * @package App\DataTables\Frontend
 */
class FacultyDataTable extends BaseDataTable
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
            ->addColumn('departments_count', function ($item) {
                return '<span class="label label-danger">' . $item->departments_count . '</span>';
            })
            ->addColumn('employees_count', function ($item) {
                return '<span class="label label-warning">' . $item->employees_count . '</span>';
            })
            ->orderColumn('departments_count', 'departments_count $1')
            ->orderColumn('employees_count', 'employees_count $1')
            ->rawColumns([
                'departments_count',
                'employees_count',
                'action'
            ]);
    }

    protected function getRouteShow(): string
    {
        return 'frontend.faculty.show';
    }

    protected function getColumns(): array
    {
        return [
            'DT_Row_Index' => [
                'title' => '#',
                'searchable' => false,
                'orderable' => false,
                'width' => '10px'
            ],
            'name' => [
                'class' => 'text-left'
            ],
            'departments_count' => [
                'title' => 'Departments count',
                'class' => 'text-center',
                'width' => '15px',
                'searchable' => false,
            ],
            'employees_count' => [
                'title' => 'Authors count',
                'class' => 'text-center',
                'width' => '15px',
                'searchable' => false,
            ],
            'action' => [
                'class' => 'text-center',
                'searchable' => false,
                'orderable' => false
            ]
        ];
    }
}
