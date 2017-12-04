<?php

namespace App\Http\Controllers\Backend\Comment;

use App\DataTables\Backend\CommentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Comment\ManageCommentRequest;
use App\Http\Requests\Backend\Comment\StoreCommentRequest;
use App\Http\Requests\Backend\Comment\UpdateCommentRequest;
use App\Repositories\Backend\CommentRepository;
use App\Repositories\Backend\EmployeeRepository;

/**
 * Class CommentController
 * @package App\Http\Controllers\Backend\Comment
 */
class CommentController extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param ManageCommentRequest $request
     * @param CommentDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(ManageCommentRequest $request, CommentDataTable $dataTable)
    {
        return $dataTable->render('backend.comment.index');
    }

    /**
     * @param ManageCommentRequest $request
     * @param EmployeeRepository $employeeRepository
     * @return \Illuminate\View\View
     */
    public function create(ManageCommentRequest $request, EmployeeRepository $employeeRepository)
    {
        return view('backend.comment.create')
            ->withEmployees($employeeRepository->get(['id', 'full_name']));
    }

    /**
     * @param StoreCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCommentRequest $request)
    {
        $this->commentRepository->create($request->only('name', 'comment', 'email', 'employee_id', 'approved'));

        flash('Comment was created.')->success()->important();

        return redirect()->route('admin.comment.index');
    }

    /**
     * @param int $id
     * @param ManageCommentRequest $request
     * @return \Illuminate\View\View
     */
    public function show(int $id, ManageCommentRequest $request)
    {
        return view('backend.comment.show')
            ->withComment($this->commentRepository->getById($id));
    }

    /**
     * @param int $id
     * @param ManageCommentRequest $request
     * @param EmployeeRepository $employeeRepository
     * @return \Illuminate\View\View
     */
    public function edit(int $id, ManageCommentRequest $request, EmployeeRepository $employeeRepository)
    {
        return view('backend.comment.edit')
            ->withComment($this->commentRepository->getById($id))
            ->withEmployees($employeeRepository->get(['id', 'full_name']));
    }

    /**
     * @param int $id
     * @param UpdateCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, UpdateCommentRequest $request)
    {
        $this->commentRepository->updateById($id, $request->only('name', 'comment', 'email', 'employee_id', 'approved'));

        flash('Comment was updated.')->success()->important();

        return redirect()->route('admin.comment.index');
    }

    /**
     * @param int $id
     * @param ManageCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id, ManageCommentRequest $request)
    {
        $this->commentRepository->deleteById($id);

        flash('Comment was deleted.')->success()->important();

        return redirect()->route('admin.comment.index');
    }

    /**
     * @param int $id
     * @param bool $state
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(int $id, bool $state)
    {
        $this->commentRepository->approve($id, $state);

        flash('Comment was approve.')->success()->important();

        return redirect()->route('admin.comment.index');
    }
}
