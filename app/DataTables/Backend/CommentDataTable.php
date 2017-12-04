<?php

namespace App\DataTables\Backend;

use App\DataTables\BaseDataTable;

/**
 * Class CommentDataTable
 * @package App\DataTables\Backend
 */
class CommentDataTable extends BaseDataTable
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
                $action = '<div class="btn-group">';
                $action .= '<a href="' . route($this->getRouteShow() . 'show', $item->id) . '" class="btn btn-info btn-xs"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail"></i></a>';
                $action .= '<a href="' . route($this->getRouteShow() . 'edit', $item->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>';
                $action .= '<a class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i><form action="' . route($this->getRouteShow() . 'destroy', $item->id) . '" method="POST" name="delete_item" style="display:none"><input type="hidden" name="_method" value="delete">' . csrf_field() . '</form></a>';
                $action .= '</div>';
                return $action;
            })
            ->addColumn('employee', function ($item) {
                return '<a href="' . route('frontend.employee.show', $item->employee_id) . '">' . $item->full_name . '</a>';
            })
            ->addColumn('approved', function ($item) {
                if (!$item->approved) {
                    return '<a href="' . route('admin.comment.approve.update', [$item->id, 1]) . '" class="btn btn-success btn-xs">Allow</a>';
                } else {
                    return '<a href="' . route('admin.comment.approve.update', [$item->id, 0]) . '" class="btn btn-danger btn-xs">Disallow</a>';
                }
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("name like ?", ["%{$keyword}%"])
                    ->orWhereRaw("email like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('employee', function ($query, $keyword) {
                $query->whereRaw("full_name like ?", ["%{$keyword}%"]);
            })
            ->orderColumn('employee', 'full_name $1')
            ->orderColumn('approved', 'approved $1')
            ->orderColumn('name', 'email $1')
            ->rawColumns([
                'action',
                'employee',
                'approved'
            ]);
    }

    protected function getRouteShow(): string
    {
        return 'admin.comment.';
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
                'title' => 'Name',
                'class' => 'text-left'
            ],
            'employee' => [
                'title' => 'Employee',
                'class' => 'text-left'
            ],
            'created_at' => [
                'title' => 'Created',
                'class' => 'text-center'
            ],
            'approved' => [
                'title' => 'Approved',
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
