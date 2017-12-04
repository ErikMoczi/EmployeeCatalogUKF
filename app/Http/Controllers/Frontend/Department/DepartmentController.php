<?php

namespace App\Http\Controllers\Frontend\Department;

use App\DataTables\Frontend\DepartmentDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\DepartmentRepository;

/**
 * Class DepartmentController
 * @package App\Http\Controllers\Frontend\Department
 */
class DepartmentController extends Controller
{
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * DepartmentController constructor.
     * @param DepartmentRepository $departmentRepository
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * @param DepartmentDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(DepartmentDataTable $dataTable)
    {
        return $dataTable->render('frontend.department.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->departmentRepository->getById($id);

        return view('frontend.department.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.department.show', $dataShow));
    }
}
