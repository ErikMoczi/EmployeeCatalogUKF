<?php

namespace App\DataTables\Frontend;

/**
 * Class DepartmentDataTable
 * @package App\DataTables\Frontend
 */
class DepartmentDataTable extends FrontendDataTable
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
            ->addColumn('faculty_name', function ($item) {
                return '<a href="' . route('frontend.faculty.show', $item->faculty_id) . '">' . $item->faculty_name . '</a>';
            })
            ->addColumn('employees_count', function ($item) {
                return '<span class="label label-warning">' . $item->employees_count . '</span>';
            })
            ->filterColumn('faculty_name', function ($query, $keyword) {
                $query->whereRaw("faculty.name like ?", ["%{$keyword}%"]);
            })
            ->orderColumn('faculty_name', 'faculty_name $1')
            ->orderColumn('employees_count', 'employees_count $1')
            ->rawColumns([
                'faculty_name',
                'employees_count',
                'action'
            ]);
    }

    protected function getRouteShow(): string
    {
        return 'frontend.department.show';
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
            'faculty_name' => [
                'title' => 'Faculty',
                'class' => 'text-left'
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
