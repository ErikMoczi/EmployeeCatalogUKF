<?php

namespace App\DataTables\Frontend;

/**
 * Class PositionDataTable
 * @package App\DataTables\Frontend
 */
class PositionDataTable extends FrontendDataTable
{
    protected function getRouteShow(): string
    {
        return 'frontend.position.show';
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
