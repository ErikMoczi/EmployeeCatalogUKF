<?php

namespace App\Http\Controllers\Frontend\Activity;

use App\Http\Controllers\Controller;
use App\Models\Data\Activity;
use App\Repositories\Frontend\ActivityRepository;

/**
 * Class ActivityController
 * @package App\Http\Controllers\Frontend\Activity
 */
class ActivityController extends Controller
{
    /**
     * @var ActivityRepository
     */
    protected $activityRepository;

    /**
     * EmployeeController constructor.
     * @param ActivityRepository $activityRepository
     */
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.activity.index')
            ->withTableData($this->activityRepository->getWithCountRelations());
    }

    /**
     * @param Activity $activity
     * @return \Illuminate\View\View
     */
    public function show(Activity $activity)
    {
        return view('frontend.activity.show')
            ->withActivity($activity)
            ->withEmployees($activity->employees()->get())
            ->withNextRecord([
                'route' => 'frontend.activity.show',
                'model' => $activity->getNextRecord()
            ])
            ->withPreviousRecord([
                'route' => 'frontend.activity.show',
                'model' => $activity->getPreviousRecord()
            ]);
    }
}
