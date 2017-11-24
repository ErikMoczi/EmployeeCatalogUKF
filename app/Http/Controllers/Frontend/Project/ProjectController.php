<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Http\Controllers\Controller;
use App\Models\Data\Project;
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
     * EmployeeController constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.project.index')
            ->withTableData($this->projectRepository->getWithCountRelations());
    }

    /**
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('frontend.project.show')
            ->withProject($project)
            ->withEmployees($project->employees()->get())
            ->withNextRecord([
                'route' => 'frontend.project.show',
                'model' => $project->getNextRecord()
            ])
            ->withPreviousRecord([
                'route' => 'frontend.project.show',
                'model' => $project->getPreviousRecord()
            ]);
    }
}
