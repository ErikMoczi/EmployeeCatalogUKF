<?php

namespace App\Http\Controllers\Frontend\Statistics;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\ActivityRepository;
use App\Repositories\Frontend\FacultyRepository;
use App\Repositories\Frontend\ProjectRepository;
use App\Repositories\Frontend\StatisticsRepository;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Collection;

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
        $dataCountry = $activityRepository->getCountryCount();
        $countryChart = Charts::create('pie', 'c3')
            ->title('Chart of country activities')
            ->labels($dataCountry->pluck('country'))
            ->values($dataCountry->pluck('aggregate'));

        $dataType = $activityRepository->getTypeCount();
        $typeChart = Charts::create('pie', 'c3')
            ->title('Chart of type activities')
            ->labels($dataType->pluck('type'))
            ->values($dataType->pluck('aggregate'));

        $dataCategory = $activityRepository->getCategoryCount();
        $categoryChart = Charts::create('pie', 'c3')
            ->title('Chart of category activities')
            ->labels($dataCategory->pluck('category'))
            ->values($dataCategory->pluck('aggregate'));

        return view('frontend.statistics.activity', compact([
            'countryChart',
            'typeChart',
            'categoryChart'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function faculty(FacultyRepository $facultyRepository)
    {
        $dataDepartment = $facultyRepository->getDepartmentCount();
        $facultyDepartmentChart = Charts::create('bar', 'highcharts')
            ->title('Chart of department faculties')
            ->elementLabel('departments')
            ->xAxisTitle('faculties')
            ->yAxisTitle('departments')
            ->oneColor(true)
            ->labels($dataDepartment->pluck('name'))
            ->values($dataDepartment->pluck('departments_count'));

        $dataEmployee = $facultyRepository->getEmployeeCount();
        $facultyEmployeeChart = Charts::create('bar', 'highcharts')
            ->title('Chart of employee faculties')
            ->elementLabel('employees')
            ->xAxisTitle('faculties')
            ->yAxisTitle('employees')
            ->oneColor(true)
            ->labels($dataEmployee->pluck('name'))
            ->values($dataEmployee->pluck('employees_count'));

        $facultyPositionChart = new Collection();
        $facultyRepository->getPositionCount()->groupBy('faculty_name')
            ->each(function ($item, $key) use ($facultyPositionChart) {
                $facultyPositionChart->put($key, Charts::create('area', 'highcharts')
                    ->title('Chart of position faculty')
                    ->elementLabel('number of positions')
                    ->xAxisTitle('positions')
                    ->yAxisTitle('count')
                    ->labels($item->pluck('position_name'))
                    ->values($item->pluck('aggregate')));
            });

        return view('frontend.statistics.faculty', compact([
            'facultyDepartmentChart',
            'facultyEmployeeChart',
            'facultyPositionChart'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function position()
    {
        return view('frontend.statistics.position');
    }
}
