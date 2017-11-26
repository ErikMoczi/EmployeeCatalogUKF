<?php

namespace App\DataTables\Frontend;

use App\DataTables\BaseDataTable;

/**
 * Class EmployeeDataTable
 * @package App\DataTables\Frontend
 */
class EmployeeDataTable extends BaseDataTable
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
            ->addColumn('publications_count', function ($item) {
                return '<span class="label label-danger">' . $item->publications_count . '</span>';
            })
            ->addColumn('projects_count', function ($item) {
                return '<span class="label label-warning">' . $item->projects_count . '</span>';
            })
            ->addColumn('activities_count', function ($item) {
                return '<span class="label label-primary">' . $item->activities_count . '</span>';
            })
            ->addColumn('faculty_name', function ($item) {
                return '<a href="' . route('frontend.faculty.show', $item->faculty_id) . '">' . $item->faculty_name . '</a>';
            })
            ->addColumn('department_name', function ($item) {
                return '<a href="' . route('frontend.department.show', $item->department_id) . '">' . $item->department_name . '</a>';
            })
            ->filterColumn('department_name', function ($query, $keyword) {
                $query->whereRaw("department.name like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('faculty_name', function ($query, $keyword) {
                $query->whereRaw("faculty.name like ?", ["%{$keyword}%"]);
            })
            ->orderColumn('full_name', 'last_name $1')
            ->orderColumn('publications_count', 'publications_count $1')
            ->orderColumn('projects_count', 'projects_count $1')
            ->orderColumn('activities_count', 'activities_count $1')
            ->orderColumn('publications_count', 'publications_count $1')
            ->orderColumn('faculty_name', 'faculty_name $1')
            ->orderColumn('department_name', 'department_name $1')
            ->rawColumns([
                'publications_count',
                'projects_count',
                'activities_count',
                'faculty_name',
                'department_name',
                'action'
            ]);
    }

    protected function getRouteShow(): string
    {
        return 'frontend.employee.show';
    }

    protected function getColumns(): array
    {
        return [
            'full_name' => [
                'title' => 'Name',
                'class' => 'text-left'
            ],
            'faculty_name' => [
                'title' => 'Faculty',
                'class' => 'text-left'
            ],
            'department_name' => [
                'title' => 'Department',
                'class' => 'text-left'
            ],
            'publications_count' => [
                'title' => 'Publications count',
                'class' => 'text-center',
                'width' => '15px',
                'searchable' => false,
            ],
            'projects_count' => [
                'title' => 'Projects count',
                'class' => 'text-center',
                'width' => '15px',
                'searchable' => false,
            ],
            'activities_count' => [
                'title' => 'Activities count',
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
