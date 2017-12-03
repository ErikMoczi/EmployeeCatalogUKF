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
     */
    public function store(StoreComment $request, int $employeeId)
    {
        $output = $this->commentRepository->createWithEmployeeRelation($request->only('name','email','comment'), $employeeId);

        flash('Comment was added, but wait for administrator to approve it.')->important();

        return redirect()->route('frontend.employee.show', $employeeId);
    }
}
