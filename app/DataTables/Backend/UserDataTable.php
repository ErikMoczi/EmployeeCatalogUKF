<?php

namespace App\DataTables\Backend;

use App\DataTables\BaseDataTable;

/**
 * Class UserDataTable
 * @package App\DataTables\Backend
 */
class UserDataTable extends BaseDataTable
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
                $action .= '<button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">More <span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu"><li><a href="' . route($this->getRouteShow() . 'password', $item->id) . '">Change password</a></li><li><a href="' . route($this->getRouteShow() . 'login-as', $item->id) . '">Login as User</a></li></ul>';
                $action .= '</div>';
                return $action;
            })
            ->addColumn('employee', function ($item) {
                return '<a href="' . route('frontend.employee.show', $item->employee_id) . '">' . $item->full_name . '</a>';
            })
            ->addColumn('admin_flag', function ($item) {
                if ($item->admin_flag) {
                    return '<span class="label label-success">Yes</span>';
                } else {
                    return '<span class="label label-danger">No</span>';
                }
            })
            ->addColumn('updated_at', function ($item) {
                return $item->updated_at->diffForHumans();
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("name like ?", ["%{$keyword}%"])
                    ->orWhereRaw("email like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('employee', function ($query, $keyword) {
                $query->whereRaw("full_name like ?", ["%{$keyword}%"]);
            })
            ->orderColumn('employee', 'full_name $1')
            ->orderColumn('admin_flag', 'admin_flag $1')
            ->orderColumn('name', 'email $1')
            ->orderColumn('updated_at', 'updated_at $1')
            ->rawColumns([
                'action',
                'employee',
                'admin_flag'
            ]);
    }

    protected function getRouteShow(): string
    {
        return 'admin.user.';
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
            'email' => [
                'title' => 'Email',
                'class' => 'text-left'
            ],
            'employee' => [
                'title' => 'Employee',
                'class' => 'text-left'
            ],
            'updated_at' => [
                'title' => 'Last Updated',
                'class' => 'text-center',
                'searchable' => false
            ],
            'admin_flag' => [
                'title' => 'Admin',
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
