<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Data\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('frontend.employee.index');
    }

    public function show(Employee $employee)
    {
        return view('frontend.employee.show')
            ->with('employee', $employee)
            ->with('position', $employee->position()->first())
            ->with('publications', $employee->publications()->get())
            ->with('projects', $employee->projects()->get())
            ->with('activities', $employee->activities()->get())
            ->with('profiles', $employee->profiles()->get())
            ->with('next_employee', $employee->getNextRecordByLastName())
            ->with('previous_employee', $employee->getPreviousRecordByLastName());
    }
}
