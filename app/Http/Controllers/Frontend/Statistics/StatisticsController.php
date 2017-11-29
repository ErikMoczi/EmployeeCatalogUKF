<?php

namespace App\Http\Controllers\Frontend\Statistics;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\ActivityRepository;
use App\Repositories\Frontend\ProjectRepository;
use App\Repositories\Frontend\StatisticsRepository;
use ConsoleTVs\Charts\Facades\Charts;

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
    public function project(ProjectRepository $projectRepository)
    {
        $dataAverage = $projectRepository->getAverageDurationProject();
        $projectAverageChart = Charts::create('bar', 'highcharts')
            ->title('Chart of average duration projects')
            ->elementLabel('projects')
            ->xAxisTitle('duration')
            ->yAxisTitle('count')
            ->oneColor(true)
            ->labels($dataAverage->pluck('duration'))
            ->values($dataAverage->pluck('aggregate'));

        $dataStarting = $projectRepository->getYearFromCount();
        $projectStartingChart = Charts::create('bar', 'highcharts')
            ->title('Chart of starting projects')
            ->elementLabel("projects")
            ->xAxisTitle('years')
            ->yAxisTitle('projects')
            ->oneColor(true)
            ->labels($dataStarting->pluck('year_from'))
            ->values($dataStarting->pluck('aggregate'));

        $dataEnding = $projectRepository->getYearToCount();
        $projectEndingChart = Charts::create('bar', 'highcharts')
            ->title('Chart of ending projects')
            ->elementLabel("projects")
            ->xAxisTitle('years')
            ->yAxisTitle('projects')
            ->oneColor(true)
            ->labels($dataEnding->pluck('year_to'))
            ->values($dataEnding->pluck('aggregate'));

        return view('frontend.statistics.project', compact([
            'projectAverageChart',
            'projectStartingChart',
            'projectEndingChart'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function activity(ActivityRepository $activityRepository)
    {
        $data = $activityRepository->all();

        $countryChart = Charts::database($data, 'pie', 'c3')
            ->title('Chart of country activities')
            ->responsive(true)
            ->groupBy('country');

        $typeChart = Charts::database($data, 'pie', 'c3')
            ->title('Chart of type activities')
            ->responsive(true)
            ->groupBy('type');

        $categoryChart = Charts::database($data, 'pie', 'c3')
            ->title('Chart of category activities')
            ->responsive(true)
            ->groupBy('category');

        return view('frontend.statistics.activity', compact([
            'countryChart',
            'typeChart',
            'categoryChart'
        ]));
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
