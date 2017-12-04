<?php

namespace App\Http\Controllers\Frontend\Faculty;

use App\DataTables\Frontend\FacultyDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\FacultyRepository;

/**
 * Class FacultyController
 * @package App\Http\Controllers\Frontend\Faculty
 */
class FacultyController extends Controller
{
    /**
     * @var FacultyRepository
     */
    private $facultyRepository;

    /**
     * FacultyController constructor.
     * @param FacultyRepository $facultyRepository
     */
    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * @param FacultyDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(FacultyDataTable $dataTable)
    {
        return $dataTable->render('frontend.faculty.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->facultyRepository->getById($id);

        return view('frontend.faculty.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.faculty.show', $dataShow));
    }
}
