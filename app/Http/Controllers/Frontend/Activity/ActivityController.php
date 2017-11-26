<?php

namespace App\Http\Controllers\Frontend\Activity;

use App\DataTables\Frontend\ActivityDataTable;
use App\Http\Controllers\Controller;
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
     * ActivityController constructor.
     * @param ActivityRepository $activityRepository
     */
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * @param ActivityDataTable $dataTable
     * @return mixed
     */
    public function index(ActivityDataTable $dataTable)
    {
        return $dataTable->render('frontend.publication.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->activityRepository->getById($id);

        return view('frontend.activity.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.activity.show', $dataShow));
    }
}
