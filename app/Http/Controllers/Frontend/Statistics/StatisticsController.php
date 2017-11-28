<?php

namespace App\Http\Controllers\Frontend\Statistics;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\StatisticsRepository;

/**
 * Class StatisticsController
 * @package App\Http\Controllers\Frontend\Statistics
 */
class StatisticsController extends Controller
{
    /**
     * @var StatisticsRepository
     */
    private $statisticsRepository;

    /**
     * StatisticsController constructor.
     * @param StatisticsRepository $statisticsRepository
     */
    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dataCount = $this->statisticsRepository->getTableCounts();

        return view('frontend.statistics.index', compact('dataCount'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function employee()
    {
        return view('frontend.statistics.emloyee');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function publication()
    {
        return view('frontend.statistics.publication');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function project()
    {
        return view('frontend.statistics.project');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function activity()
    {
        return view('frontend.statistics.activity');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function faculty()
    {
        return view('frontend.statistics.faculty');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function department()
    {
        return view('frontend.statistics.department');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function position()
    {
        return view('frontend.statistics.position');
    }
}
