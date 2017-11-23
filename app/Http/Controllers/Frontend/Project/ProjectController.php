<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Http\Controllers\Controller;
use App\Models\Data\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('frontend.project.index');
    }

    public function show(Project $project)
    {
        return view('frontend.project.show')
            ->with('project', $project)
            ->with('employees', $project->employees()->get());
    }
}
