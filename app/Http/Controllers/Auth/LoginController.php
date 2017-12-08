<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Auth\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAs()
    {
        if (!auth()->user()) {
            return redirect()->route('auth.login');
        }

        if (session()->has('observer_user_id') && session()->has('temp_user_id')) {
            $observerId = session()->get('observer_user_id');

            app()->make(Auth::class)->flushTempSession();

            auth()->loginUsingId((int)$observerId);

            return redirect()->route('admin.user.index');
        } else {
            app()->make(Auth::class)->flushTempSession();

            auth()->logout();

            return redirect()->route('auth.login');
        }
    }

    /**
     * @return string
     */
    protected function redirectTo()
    {
        return route(home_route());
    }
}
