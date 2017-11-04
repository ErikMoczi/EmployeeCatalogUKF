<?php

namespace App\Console\Commands;

use App\Internal\DataLoading\DataPump;
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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DataPump $dataPump)
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
        $this->info('Ahoj ja som'. DataPumpBaseCommand::class);
    }
}
