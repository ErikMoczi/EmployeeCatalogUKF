<?php

namespace App\Http\Controllers\Frontend\Position;

use App\DataTables\Frontend\PositionDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\PositionRepository;

/**
 * Class PositionController
 * @package App\Http\Controllers\Frontend\Position
 */
class PositionController extends Controller
{
    /**
     * @var PositionRepository
     */
    private $positionRepository;

    /**
     * PositionController constructor.
     * @param PositionRepository $positionRepository
     */
    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    /**
     * @param PositionDataTable $dataTable
     * @return \Illuminate\View\View
     */
    public function index(PositionDataTable $dataTable)
    {
        return $dataTable->render('frontend.position.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $dataShow = $this->positionRepository->getById($id);

        return view('frontend.position.show')
            ->withDataShow($dataShow)
            ->withNavigationRecord(record_navigation_init('frontend.position.show', $dataShow));
    }
}
