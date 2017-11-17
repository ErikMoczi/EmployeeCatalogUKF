<?php

namespace App\Console\Commands\DataLoading;

/**
 * Class DataPumpUpdateCommand
 * @package App\Console\Commands\DataLoading
 */
class DataPumpUpdateCommand extends DataPumpBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datapump:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     *
     */
    public function runPump(): void
    {
        // TODO: Implement runPump() method.
    }
}
