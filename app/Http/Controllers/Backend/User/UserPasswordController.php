<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\ManageUserRequest;
use App\Http\Requests\Backend\User\UpdateUserPasswordRequest;
use App\Repositories\Backend\UserRepository;

/**
 * Class UserPasswordController
 * @package App\Http\Controllers\Backend\User
 */
class UserPasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @param ManageUserRequest $request
     * @return \Illuminate\View\View
     */
    public function edit(int $id, ManageUserRequest $request)
    {
        return view('backend.user.changePassword')
            ->withUserId($id);
    }

    /**
     * @param int $id
     * @param UpdateUserPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\GeneralException
     */
    public function update(int $id, UpdateUserPasswordRequest $request)
    {
        $this->userRepository->updatePassword($id, $request->only('password'));

        flash('User password was updaed.')->success()->important();

        return redirect()->route('admin.user.index');
    }
}
