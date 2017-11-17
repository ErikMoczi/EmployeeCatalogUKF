<?php

namespace App\Facades\General;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Helpers\General\DataPumpHelper
 */
class DataPumpHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return \App\Helpers\General\DataPumpHelper::class;
    }
}
