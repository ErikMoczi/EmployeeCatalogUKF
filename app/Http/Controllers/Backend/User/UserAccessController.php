<?php

namespace App\Http\Controllers\Backend\User;

use App\Exceptions\GeneralException;
use App\Helpers\Auth\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\ManageUserRequest;

/**
 * Class UserAccessController
 * @package App\Http\Controllers\Backend\User
 */
class UserAccessController extends Controller
{
    /**
     * @param int $userId
     * @param ManageUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws GeneralException
     */
    public function loginAs(int $userId, ManageUserRequest $request)
    {
        if (session()->has('observer_user_id') && session()->has('temp_user_id')) {
            if ($request->user()->id == $userId || session()->get('observer_user_id') == $userId) {
                throw new GeneralException('Do not try to login as yourself.');
            }

            session(['temp_user_id' => $userId]);

            auth()->loginUsingId($userId);

            return redirect()->route(home_route());
        }

        app()->make(Auth::class)->flushTempSession();

        if ($request->user()->id == $userId) {
            throw new GeneralException('Do not try to login as yourself.');
        }

        session(['observer_user_id' => $request->user()->id]);
        session(['observer_user_name' => $request->user()->name]);
        session(['temp_user_id' => $userId]);

        auth()->loginUsingId($userId);

        return redirect()->route(home_route());
    }
}
