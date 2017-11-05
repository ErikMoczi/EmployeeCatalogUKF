<?php

namespace App\Console\Commands;

use App\Internal\DataLoading\IDataPump;
use Illuminate\Console\Command;

abstract class DataPumpBaseCommand extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $dataPump;

    public function __construct(IDataPump $dataPump)
    {
        parent::__construct();

        $this->dataPump = $dataPump;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->dataPump->run();
    }
}
