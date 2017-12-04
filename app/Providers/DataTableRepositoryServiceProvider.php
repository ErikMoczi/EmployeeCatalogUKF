<?php

namespace App\Providers;

use App\DataTables\Backend\CommentDataTable;
use App\DataTables\Frontend\ActivityDataTable;
use App\DataTables\Frontend\DepartmentDataTable;
use App\DataTables\Frontend\EmployeeDataTable;
use App\DataTables\Frontend\FacultyDataTable;
use App\DataTables\Frontend\PositionDataTable;
use App\DataTables\Frontend\ProjectDataTable;
use App\DataTables\Frontend\PublicationDataTable;
use App\Repositories\Backend\CommentRepository;
use App\Repositories\Frontend\ActivityRepository;
use App\Repositories\Frontend\DepartmentRepository;
use App\Repositories\Frontend\EmployeeRepository;
use App\Repositories\Frontend\FacultyRepository;
use App\Repositories\Frontend\PositionRepository;
use App\Repositories\Frontend\ProjectRepository;
use App\Repositories\Frontend\PublicationRepository;
use App\Repositories\IDataTableRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class DataTableRepositoryServiceProvider
 * @package App\Providers
 */
class DataTableRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Frontend
         */
        $this->app->when(PublicationDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(PublicationRepository::class);

        $this->app->when(ProjectDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(ProjectRepository::class);

        $this->app->when(PositionDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(PositionRepository::class);

        $this->app->when(FacultyDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(FacultyRepository::class);

        $this->app->when(EmployeeDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(EmployeeRepository::class);

        $this->app->when(DepartmentDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(DepartmentRepository::class);

        $this->app->when(ActivityDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(ActivityRepository::class);

        /*
         * Backend
         */
        $this->app->when(CommentDataTable::class)
            ->needs(IDataTableRepository::class)
            ->give(CommentRepository::class);
    }
}
