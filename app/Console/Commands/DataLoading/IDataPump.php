<?php

namespace App\Console\Commands\DataLoading;

/**
 * Interface IDataPump
 * @package App\Console\Commands\DataLoading
 */
interface IDataPump
{
    public function runPump(): void;
}
