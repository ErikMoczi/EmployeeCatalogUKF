<?php

namespace App\Facades\General;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Helpers\General\EmailHelper
 */
class EmailHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return \App\Helpers\General\EmailHelper::class;
    }
}
