<?php

namespace App\DataTables\Frontend;

/**
 * Class ActivityDataTable
 * @package App\DataTables\Frontend
 */
class ActivityDataTable extends FrontendDataTable
{
    protected function getRouteShow(): string
    {
        return 'frontend.activity.show';
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
            'key' => [
                'class' => 'text-center',
                'width' => '20px'
            ],
            'title' => [
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
