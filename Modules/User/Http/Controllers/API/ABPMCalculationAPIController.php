<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateABPMCalculationAPIRequest;
use Modules\User\Http\Requests\API\UpdateABPMCalculationAPIRequest;
use Modules\User\Models\ABPMCalculation;
use Modules\User\Repositories\ABPMCalculationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ABPMCalculationController
 * @package Modules\User\Http\Controllers\API
 */

class ABPMCalculationAPIController extends AppBaseController
{
    /** @var  ABPMCalculationRepository */
    private $aobpCalculationRepository;

    public function __construct(ABPMCalculationRepository $aobpCalculationRepo)
    {
        $this->aobpCalculationRepository = $aobpCalculationRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the ABPMCalculation.
     * GET|HEAD /aobpCalculations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aobpCalculations = $this->aobpCalculationRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
           if (!auth()->user()->master) {
            $aobpCalculations = $aobpCalculations->where("user_id", auth()->user()->id);
            $aobpCalculationsCount = ABPMCalculation::where("user_id", auth()->user()->id)->count();
        } else {
            $aobpCalculationsCount = ABPMCalculation::count();
        }
        
        $aobpCalculations = $aobpCalculations->get();
        $limit=$request->get('limit',10);
        
        return $this->sendResponse(['pagination_data'=>['count'=>$aobpCalculationsCount,'total_pages'=>ceil($aobpCalculationsCount/$limit)],'items'=>$aobpCalculations->toArray()], 'ABPM Calculations retrieved successfully');
    }

    /**
     * Store a newly created ABPMCalculation in storage.
     * POST /aobpCalculations
     *
     * @param CreateABPMCalculationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateABPMCalculationAPIRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        $aobpCalculation = $this->aobpCalculationRepository->create($input);

        return $this->sendResponse($aobpCalculation->toArray(), 'ABPM Calculation saved successfully');
    }

    /**
     * Display the specified ABPMCalculation.
     * GET|HEAD /aobpCalculations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ABPMCalculation $aobpCalculation */
        $aobpCalculation = $this->aobpCalculationRepository->find($id);

        if (empty($aobpCalculation)) {
            return $this->sendError('ABPM Calculation not found');
        }

        return $this->sendResponse($aobpCalculation->toArray(), 'ABPM Calculation retrieved successfully');
    }

    /**
     * Update the specified ABPMCalculation in storage.
     * PUT/PATCH /aobpCalculations/{id}
     *
     * @param int $id
     * @param UpdateABPMCalculationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateABPMCalculationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ABPMCalculation $aobpCalculation */
        $aobpCalculation = $this->aobpCalculationRepository->find($id);

        if (empty($aobpCalculation)) {
            return $this->sendError('ABPM Calculation not found');
        }

        $aobpCalculation = $this->aobpCalculationRepository->update($input, $id);

        return $this->sendResponse($aobpCalculation->toArray(), 'ABPMCalculation updated successfully');
    }

    /**
     * Remove the specified ABPMCalculation from storage.
     * DELETE /aobpCalculations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ABPMCalculation $aobpCalculation */
        $aobpCalculation = $this->aobpCalculationRepository->find($id);

        if (empty($aobpCalculation)) {
            return $this->sendError('ABPM Calculation not found');
        }

        $aobpCalculation->delete();

        return $this->sendSuccess('ABPM Calculation deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $aobpCalculationsCount = $this->aobpCalculationRepository->count();
        return $this->sendResponse(['count'=>$aobpCalculationsCount,'total_pages'=>ceil($aobpCalculationsCount/$limit)], 'ABPM Calculations Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->aobpCalculationRepository->multiDelete($ids)], 'Selected ABPM Calculations Deleted');
    }
    public function export()
    {
        return $this->aobpCalculationRepository->export()->download("ABPM Calculations-".date("Y-m-d").".xlsx");
    }
}
