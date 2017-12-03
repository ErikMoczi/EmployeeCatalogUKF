<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class AccountController
 * @package App\Http\Controllers\Frontend\User
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }
}
