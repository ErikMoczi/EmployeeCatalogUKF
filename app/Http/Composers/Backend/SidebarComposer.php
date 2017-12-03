<?php

namespace App\Http\Composers\Backend;

use App\Repositories\Backend\CommentRepository;
use Illuminate\View\View;

/**
 * Class SidebarComposer
 * @package App\Http\Composers\Backend
 */
class SidebarComposer
{
    /**
     * @var CommentRepository
     */
    protected $commentRepository;

    /**
     * SidebarComposer constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('comment_notapproved', $this->commentRepository->getNotApprovedCount());
    }
}
