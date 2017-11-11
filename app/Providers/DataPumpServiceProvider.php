<?php

namespace App\Providers;

use App\Console\Commands\DataPumpCreateCommand;
use App\Console\Commands\DataPumpUpdateCommand;
use App\Internal\DataLoading\DataPumpCreate;
use App\Internal\DataLoading\DataPumpUpdate;
use App\Internal\DataLoading\IDataPump;
use Illuminate\Support\ServiceProvider;

class DataPumpServiceProvider extends ServiceProvider
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
        $this->app->when(DataPumpCreateCommand::class)
            ->needs(IDataPump::class)
            ->give(DataPumpCreate::class);

        $this->app->when(DataPumpUpdateCommand::class)
            ->needs(IDataPump::class)
            ->give(DataPumpUpdate::class);
    }
}
