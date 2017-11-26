<?php

namespace App\DataTables\Frontend;

/**
 * Class ProjectDataTable
 * @package App\DataTables\Frontend
 */
class ProjectDataTable extends FrontendDataTable
{
    protected function getRouteShow(): string
    {
        return 'frontend.project.show';
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
            'title' => [
                'class' => 'text-left'
            ],
            'year_from' => [
                'class' => 'text-center'
            ],
            'year_to' => [
                'class' => 'text-center'
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
