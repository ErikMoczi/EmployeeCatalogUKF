<?php

namespace App\DataTables\Frontend;

/**
 * Class PublicationDataTable
 * @package App\DataTables\Frontend
 */
class PublicationDataTable extends FrontendDataTable
{
    protected function getRouteShow(): string
    {
        return 'frontend.publication.show';
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
            'ISBN' => [
                'class' => 'text-center'
            ],
            'title' => [
                'class' => 'text-left'
            ],
            'type' => [
                'class' => 'text-left'
            ],
            'publisher' => [
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
