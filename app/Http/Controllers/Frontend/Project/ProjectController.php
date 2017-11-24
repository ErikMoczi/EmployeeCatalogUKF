<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Http\Controllers\Controller;
use App\Models\Data\Project;

/**
 * Class ProjectController
 * @package App\Http\Controllers\Frontend\Project
 */
class ProjectController extends Controller
{
    public function index()
    {
        return view('frontend.project.index');
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
