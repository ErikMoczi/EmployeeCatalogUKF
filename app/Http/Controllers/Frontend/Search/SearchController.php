<?php

namespace App\Http\Controllers\Frontend\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\ActivityRepository;
use App\Repositories\Frontend\DepartmentRepository;
use App\Repositories\Frontend\EmployeeRepository;
use App\Repositories\Frontend\FacultyRepository;
use App\Repositories\Frontend\PositionRepository;
use App\Repositories\Frontend\ProjectRepository;
use App\Repositories\Frontend\PublicationRepository;
use Illuminate\Http\Request;

/**
 * Class SearchController
 * @package App\Http\Controllers\Frontend\Search
 */
class SearchController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var PublicationRepository
     */
    private $publicationRepository;

    /**
     * @var PositionRepository
     */
    private $positionRepository;

    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;
    /**
     * @var FacultyRepository
     */
    private $facultyRepository;

    /**
     * SearchController constructor.
     * @param EmployeeRepository $employeeRepository
     * @param ActivityRepository $activityRepository
     * @param ProjectRepository $projectRepository
     * @param PublicationRepository $publicationRepository
     * @param PositionRepository $positionRepository
     * @param DepartmentRepository $departmentRepository
     * @param FacultyRepository $facultyRepository
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        ActivityRepository $activityRepository,
        ProjectRepository $projectRepository,
        PublicationRepository $publicationRepository,
        PositionRepository $positionRepository,
        DepartmentRepository $departmentRepository,
        FacultyRepository $facultyRepository
    )
    {
        $this->employeeRepository = $employeeRepository;
        $this->activityRepository = $activityRepository;
        $this->projectRepository = $projectRepository;
        $this->publicationRepository = $publicationRepository;
        $this->positionRepository = $positionRepository;
        $this->departmentRepository = $departmentRepository;
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.search.index');
    }

    public function search(Request $request)
    {
        $searchWord = null;
        $results = collect();

        if ($request->filled('searchWord')) {
            $searchWord = $request->input('searchWord');

            $results->put('employee', $this->employeeRepository->getFullTextSearch($searchWord));
            $results->put('publication', $this->publicationRepository->getFullTextSearch($searchWord));
            $results->put('project', $this->projectRepository->getFullTextSearch($searchWord));
            $results->put('activity', $this->activityRepository->getFullTextSearch($searchWord));
            $results->put('department', $this->departmentRepository->getFullTextSearch($searchWord));
            $results->put('faculty', $this->facultyRepository->getFullTextSearch($searchWord));
            $results->put('position', $this->positionRepository->getFullTextSearch($searchWord));
        }

        return view('frontend.search.index', compact([
            'results',
            'searchWord'
        ]));
    }
}
