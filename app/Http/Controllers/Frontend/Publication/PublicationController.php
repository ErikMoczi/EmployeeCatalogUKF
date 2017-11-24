<?php

namespace App\Http\Controllers\Frontend\Publication;

use App\Http\Controllers\Controller;
use App\Models\Data\Publication;
use App\Repositories\Frontend\PublicationRepository;

/**
 * Class PublicationController
 * @package App\Http\Controllers\Frontend\Publication
 */
class PublicationController extends Controller
{
    /**
     * @var PublicationRepository
     */
    protected $publicationRepository;

    /**
     * EmployeeController constructor.
     * @param PublicationRepository $publicationRepository
     */
    public function __construct(PublicationRepository $publicationRepository)
    {
        $this->publicationRepository = $publicationRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.publication.index')
            ->withTableData($this->publicationRepository->getWithCountRelations());
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
