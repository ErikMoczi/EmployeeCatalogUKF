<?php

namespace App\Http\Controllers\Frontend\Activity;

use App\Http\Controllers\Controller;
use App\Models\Data\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        return view('frontend.activity.index');
    }

    public function show(Activity $activity)
    {
        return view('frontend.activity.show')
            ->with('activity', $activity)
            ->with('employees', $activity->employees()->get());
    }
}
