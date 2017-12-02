<?php

namespace App\Http\Controllers\Frontend\Search;

use App\Http\Controllers\Controller;

/**
 * Class SearchController
 * @package App\Http\Controllers\Frontend\Search
 */
class SearchController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.search.index');
    }
}
