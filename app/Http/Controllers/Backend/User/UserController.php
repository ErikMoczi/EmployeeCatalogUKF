<?php

namespace App\Http\Controllers\Backend\User;

use App\DataTables\Backend\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\ManageUserRequest;
use App\Http\Requests\Backend\User\StoreUserRequest;
use App\Http\Requests\Backend\User\UpdateUserRequest;
use App\Repositories\Backend\UserRepository;

/**
 * Class UserController
 * @package App\Http\Controllers\Backend\User
 */
class UserController extends Controller
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
     * @param ManageUserRequest $request
     * @param UserDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(ManageUserRequest $request, UserDataTable $dataTable)
    {
        return $dataTable->render('backend.user.index');
    }

    /**
     * @param ManageUserRequest $request
     * @return \Illuminate\View\View
     */
    public function create(ManageUserRequest $request)
    {
        return view('backend.user.create')
            ->withEmployees($this->userRepository->getUnusedEmployees());
    }

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only('name', 'email', 'employee_id', 'password', 'admin_flag'));

        flash('User was created.')->success()->important();

        return redirect()->route('admin.user.index');
    }

    /**
     * @param int $id
     * @param ManageUserRequest $request
     * @return \Illuminate\View\View
     */
    public function show(int $id, ManageUserRequest $request)
    {
        return view('backend.user.show')
            ->withUser($this->userRepository->getById($id));
    }

    /**
     * @param int $id
     * @param ManageUserRequest $request
     * @return \Illuminate\View\View
     */
    public function edit(int $id, ManageUserRequest $request)
    {
        $user = $this->userRepository->getById($id);

        return view('backend.user.edit')
            ->withUser($user)
            ->withEmployees($this->userRepository->getUnusedEmployees($user->employee_id ?: 0));
    }

    /**
     * @param int $id
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, UpdateUserRequest $request)
    {
        $this->userRepository->updateById($id, $request->only('name', 'email', 'employee_id', 'password', 'admin_flag'));

        flash('User was updated.')->success()->important();

        return redirect()->route('admin.user.index');
    }

    /**
     * @param int $id
     * @param ManageUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id, ManageUserRequest $request)
    {
        $this->userRepository->deleteById($id);

        flash('User was deleted.')->success()->important();

        return redirect()->route('admin.user.index');
    }
}
