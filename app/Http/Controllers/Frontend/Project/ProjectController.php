<?php

namespace App\Http\Controllers\Frontend\Project;

use App\DataTables\Frontend\ProjectDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\ProjectRepository;

/**
 * Class ProjectController
 * @package App\Http\Controllers\Frontend\Project
 */
class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param ProjectDataTable $dataTable
     * @return mixed
     */
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('frontend.project.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->projectRepository->getById($id);

        return view('frontend.project.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.project.show', $dataShow));
    }
}
