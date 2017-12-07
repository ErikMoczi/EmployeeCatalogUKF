<?php

namespace App\Helpers\Auth;

/**
 * Class Auth
 * @package App\Helpers\Auth
 */
class Auth
{
    public function flushTempSession()
    {
        session()->forget('observer_user_id');
        session()->forget('observer_user_name');
        session()->forget('temp_user_id');
    }
}
