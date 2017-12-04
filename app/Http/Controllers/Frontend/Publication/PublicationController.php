<?php

namespace App\Http\Controllers\Frontend\Publication;

use App\DataTables\Frontend\PublicationDataTable;
use App\Http\Controllers\Controller;
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
    private $publicationRepository;

    /**
     * PublicationController constructor.
     * @param PublicationRepository $publicationRepository
     */
    public function __construct(PublicationRepository $publicationRepository)
    {
        $this->publicationRepository = $publicationRepository;
    }

    /**
     * @param PublicationDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(PublicationDataTable $dataTable)
    {
        return $dataTable->render('frontend.publication.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->publicationRepository->getById($id);

        return view('frontend.publication.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.publication.show', $dataShow));
    }
}
