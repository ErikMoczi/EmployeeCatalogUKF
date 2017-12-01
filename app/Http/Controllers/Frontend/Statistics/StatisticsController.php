<?php

namespace App\Http\Controllers\Frontend\Statistics;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\ActivityRepository;
use App\Repositories\Frontend\EmployeeRepository;
use App\Repositories\Frontend\FacultyRepository;
use App\Repositories\Frontend\ProjectRepository;
use App\Repositories\Frontend\PublicationRepository;
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
    public function employee(EmployeeRepository $employeeRepository)
    {
        $baseData = $employeeRepository->getPublishingStats()->groupBy('faculty_name');
        $publishingAggregate = $employeeRepository->getPublishingAgregateStats();

        $dataStats = $baseData->map(function ($value, $key) use ($baseData) {
            $publishingTypes = $value
                ->filter(function ($value, $key) {
                    return $value->type ? $value : null;
                })
                ->groupBy('type');

            $searchData = $baseData
                ->except($key)
                ->collapse()
                ->filter(function ($value, $key) {
                    return $value->type ? $value : null;
                })
                ->groupBy('type')
                ->only($publishingTypes->keys()->toArray())
                ->map(function ($item) {
                    return $item->pluck('type', 'publishing_id');
                });

            return collect(['faculty_name' => $key])
                ->put(
                    'data',
                    $publishingTypes->mapWithKeys(function ($value, $key) use ($searchData) {
                        list($shared, $unique) = $value->partition(function ($i) use ($searchData) {
                            return $searchData[$i->type]->has($i->publishing_id);
                        });

                        return collect([
                            $key => collect([
                                'shared' => count($shared),
                                'unique' => count($unique)
                            ])
                        ]);
                    })
                )
                ->mapWithKeys(function ($value, $key) {
                    $out = collect();

                    if ($key == 'data') {
                        $total = $value->reduce(function ($count, $value) {
                            return $count += $value['shared'] + $value['unique'];
                        }, 0);

                        $out->put('total', $total);

                        $value = $value->mapWithKeys(function ($value, $key) use ($total) {
                            return collect([
                                $key => $value->union([
                                    'percentage' => round(($value['shared'] + $value['unique']) * 100 / $total, 2)
                                ])
                            ]);
                        });
                    }

                    return $out->put($key, $value);
                });
        });

        $publishingChart = Charts::create('bar', 'highcharts')
            ->title('Chart of publishing')
            ->elementLabel('publishing')
            ->xAxisTitle('faculties')
            ->yAxisTitle('publishing')
            ->oneColor(true)
            ->labels($dataStats->keys())
            ->values($dataStats->pluck('total'));

        return view('frontend.statistics.emloyee', compact([
            'publishingChart',
            'dataStats',
            'publishingAggregate'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function publication(PublicationRepository $publicationRepository)
    {
        $dataType = $publicationRepository->getTypeCountStats();
        $dataPages = $publicationRepository->getPagesCountStats();
        $dataCode = $publicationRepository->getCodeFirstLetterCountStats();

        $categoryCharts = new Collection([
            'Type' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of type activities')
                    ->elementLabel('publications')
                    ->xAxisTitle('type')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataType->pluck('type'))
                    ->values($dataType->pluck('publication_count')),
            'Code' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of code activities')
                    ->elementLabel('publications')
                    ->xAxisTitle('code')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataCode->pluck('code_transform'))
                    ->values($dataCode->pluck('publication_count')),
            'Pages' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of pages activities')
                    ->elementLabel('publications')
                    ->xAxisTitle('pages')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataPages->pluck('pages_filtered'))
                    ->values($dataPages->pluck('publication_count'))
        ]);

        $employeeCharts = new Collection([
            'Type' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of average employee count for type')
                    ->elementLabel('authors')
                    ->xAxisTitle('type')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataType->pluck('type'))
                    ->values($dataType->pluck('average_employee')),
            'Code' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of average employee count for code')
                    ->elementLabel('authors')
                    ->xAxisTitle('code')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataCode->pluck('code_transform'))
                    ->values($dataCode->pluck('average_employee')),
            'Pages' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of average employee count for pages')
                    ->elementLabel('authors')
                    ->xAxisTitle('pages')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataPages->pluck('pages_filtered'))
                    ->values($dataPages->pluck('average_employee'))
        ]);

        return view('frontend.statistics.publication', compact([
            'categoryCharts',
            'employeeCharts'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function project(ProjectRepository $projectRepository)
    {
        $dataAverage = $projectRepository->getAverageDurationProject();
        $dataStarting = $projectRepository->getYearFromCount();
        $dataEnding = $projectRepository->getYearToCount();

        $yearCharts = new Collection([
            'Average' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of average duration projects')
                    ->elementLabel('projects')
                    ->xAxisTitle('duration')
                    ->yAxisTitle('count')
                    ->oneColor(true)
                    ->labels($dataAverage->pluck('duration'))
                    ->values($dataAverage->pluck('aggregate')),
            'Starting' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of starting projects')
                    ->elementLabel("projects")
                    ->xAxisTitle('years')
                    ->yAxisTitle('projects')
                    ->oneColor(true)
                    ->labels($dataStarting->pluck('year_from'))
                    ->values($dataStarting->pluck('aggregate')),
            'Ending' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of ending projects')
                    ->elementLabel("projects")
                    ->xAxisTitle('years')
                    ->yAxisTitle('projects')
                    ->oneColor(true)
                    ->labels($dataEnding->pluck('year_to'))
                    ->values($dataEnding->pluck('aggregate'))
        ]);

        return view('frontend.statistics.project', compact([
            'yearCharts'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function activity(ActivityRepository $activityRepository)
    {
        $dataCountry = $activityRepository->getCountryCount();
        $dataCategory = $activityRepository->getCategoryCount();
        $dataType = $activityRepository->getTypeCount();

        $categoryCharts = new Collection([
            'Country' =>
                Charts::create('pie', 'c3')
                    ->title('Chart of country activities')
                    ->labels($dataCountry->pluck('country'))
                    ->values($dataCountry->pluck('aggregate')),
            'Type' =>
                Charts::create('pie', 'c3')
                    ->title('Chart of type activities')
                    ->labels($dataType->pluck('type'))
                    ->values($dataType->pluck('aggregate')),
            'Category' =>
                Charts::create('pie', 'c3')
                    ->title('Chart of category activities')
                    ->labels($dataCategory->pluck('category'))
                    ->values($dataCategory->pluck('aggregate'))
        ]);

        return view('frontend.statistics.activity', compact([
            'categoryCharts'
        ]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function faculty(FacultyRepository $facultyRepository)
    {
        $dataDepartment = $facultyRepository->getDepartmentCount();
        $dataEmployee = $facultyRepository->getEmployeeCount();

        $positionCharts = new Collection();
        $facultyRepository->getPositionCount()->groupBy('faculty_name')
            ->each(function ($item, $key) use ($positionCharts) {
                $positionCharts->put($key, Charts::create('area', 'highcharts')
                    ->title('Chart of position faculty')
                    ->elementLabel('number of positions')
                    ->xAxisTitle('positions')
                    ->yAxisTitle('count')
                    ->labels($item->pluck('position_name'))
                    ->values($item->pluck('aggregate')));
            });

        $categoryCharts = new Collection([
            'Departments' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of department faculties')
                    ->elementLabel('departments')
                    ->xAxisTitle('faculties')
                    ->yAxisTitle('departments')
                    ->oneColor(true)
                    ->labels($dataDepartment->pluck('name'))
                    ->values($dataDepartment->pluck('departments_count')),
            'Employees' =>
                Charts::create('bar', 'highcharts')
                    ->title('Chart of employee faculties')
                    ->elementLabel('employees')
                    ->xAxisTitle('faculties')
                    ->yAxisTitle('employees')
                    ->oneColor(true)
                    ->labels($dataEmployee->pluck('name'))
                    ->values($dataEmployee->pluck('employees_count'))
        ]);

        return view('frontend.statistics.faculty', compact([
            'categoryCharts',
            'positionCharts'
        ]));
    }
}
