<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\DataLoading\UserRepository;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend\User
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ProfileController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->userRepository->update(
            $request->user()->id,
            $request->only('name', 'email')
        );

        if (is_array($output) && $output['email_changed']) {
            auth()->logout();

            flash('Email address has been changed.')->success()->important();

            return redirect()->route('auth.login');
        }

        flash('Profile successfully updated.')->success()->important();

        return redirect()->route('frontend.user.account');
    }
}
