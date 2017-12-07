<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Comment\StoreComment;
use App\Repositories\Frontend\CommentRepository;

/**
 * Class CommentController
 * @package App\Http\Controllers\Frontend
 */
class CommentController extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * EmployeeController constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param StoreComment $request
     * @param int $employeeId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(StoreComment $request, int $employeeId)
    {
        $this->commentRepository->createWithEmployeeRelation($request->only('name', 'email', 'comment', auth()->user() ? 'approved' : ''), $employeeId);

        if (auth()->user()) {
            flash('Comment was added.')->success()->important();
        } else {
            flash('Comment was added, but wait for administrator to approve it.')->important();
        }

        return redirect()->route('frontend.employee.show', $employeeId);
    }
}
