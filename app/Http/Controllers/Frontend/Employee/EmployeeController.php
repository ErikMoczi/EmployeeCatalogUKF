<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Data\Employee;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Frontend\Employee
 */
class EmployeeController extends Controller
{
    public function index()
    {
        return view('frontend.employee.index');
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\View\View
     */
    public function show(Employee $employee)
    {
        return view('frontend.employee.show')
            ->withEmployee($employee)
            ->withPosition($employee->position()->first())
            ->withPublications($employee->publications()->get())
            ->withProjects($employee->projects()->get())
            ->withActivities($employee->activities()->get())
            ->withProfiles($employee->profiles()->get())
            ->withNextRecord([
                'route' => 'frontend.employee.show',
                'model' => $employee->getNextRecordByLastName()
            ])
            ->withPreviousRecord([
                'route' => 'frontend.employee.show',
                'model' => $employee->getPreviousRecordByLastName()
            ]);
    }
}
