<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\ActivityRepository;
use App\Repositories\Frontend\EmployeeRepository;
use App\Repositories\Frontend\ProjectRepository;
use App\Repositories\Frontend\PublicationRepository;

/**
 * Class HomeController
 * @package App\Http\Controllers\Frontend
 */
class HomeController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;
    /**
     * @var PublicationRepository
     */
    private $publicationRepository;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * HomeController constructor.
     * @param EmployeeRepository $employeeRepository
     * @param PublicationRepository $publicationRepository
     * @param ProjectRepository $projectRepository
     * @param ActivityRepository $activityRepository
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        PublicationRepository $publicationRepository,
        ProjectRepository $projectRepository,
        ActivityRepository $activityRepository
    )
    {
        $this->employeeRepository = $employeeRepository;
        $this->publicationRepository = $publicationRepository;
        $this->projectRepository = $projectRepository;
        $this->activityRepository = $activityRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $topEmployees = $this->employeeRepository->getTopEmployees();
        $employeeCount = $this->employeeRepository->makeModel()->count();
        $publicationCount = $this->publicationRepository->makeModel()->count();
        $projectCount = $this->projectRepository->makeModel()->count();
        $activityCount = $this->activityRepository->makeModel()->count();

        return view('frontend.index', compact([
            'topEmployees',
            'employeeCount',
            'publicationCount',
            'projectCount',
            'activityCount'
        ]));
    }
}
