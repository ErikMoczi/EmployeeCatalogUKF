<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\DataTables\Frontend\EmployeeDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\EmployeeRepository;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Frontend\Employee
 */
class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * EmployeeController constructor.
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param EmployeeDataTable $dataTable
     * @return mixed
     */
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('frontend.employee.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->employeeRepository->getById($id);

        return view('frontend.employee.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.employee.show', $dataShow));
    }
}
