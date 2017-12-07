<?php

namespace App\Http\Composers\Frontend;

use App\Repositories\Frontend\FacultyRepository;
use Illuminate\View\View;

/**
 * Class SearchComposer
 * @package App\Http\Composers\Frontend
 */
class SearchComposer
{
    /**
     * @var FacultyRepository
     */
    protected $facultyRepository;

    /**
     * SearchComposer constructor.
     * @param FacultyRepository $facultyRepository
     */
    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('faculties', $this->facultyRepository->all());
    }
}
