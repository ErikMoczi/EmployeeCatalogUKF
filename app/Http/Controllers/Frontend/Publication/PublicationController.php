<?php

namespace App\Http\Controllers\Frontend\Publication;

use App\Http\Controllers\Controller;
use App\Models\Data\Publication;

/**
 * Class PublicationController
 * @package App\Http\Controllers\Frontend\Publication
 */
class PublicationController extends Controller
{
    public function index()
    {
        return view('frontend.employee.index');
    }

    /**
     * @param Publication $publication
     * @@return \Illuminate\View\View
     */
    public function show(Publication $publication)
    {
        return view('frontend.publication.show')
            ->withPublication($publication)
            ->withEmployees($publication->employees()->get())
            ->withNextRecord([
                'route' => 'frontend.publication.show',
                'model' => $publication->getNextRecord()
            ])
            ->withPreviousRecord([
                'route' => 'frontend.publication.show',
                'model' => $publication->getPreviousRecord()
            ]);
    }
}
