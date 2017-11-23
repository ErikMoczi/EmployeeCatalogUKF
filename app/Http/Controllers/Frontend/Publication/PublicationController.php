<?php

namespace App\Http\Controllers\Frontend\Publication;

use App\Http\Controllers\Controller;
use App\Models\Data\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        return view('frontend.employee.index');
    }

    public function show(Publication $publication)
    {
        return view('frontend.publication.show')
            ->with('publication', $publication)
            ->with('employees', $publication->employees()->get());
    }
}
