<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateAobpCalculationAPIRequest;
use Modules\User\Http\Requests\API\UpdateAobpCalculationAPIRequest;
use Modules\User\Models\AobpCalculation;
use Modules\User\Repositories\AobpCalculationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AobpCalculationController
 * @package Modules\User\Http\Controllers\API
 */

class AobpCalculationAPIController extends AppBaseController
{
    /** @var  AobpCalculationRepository */
    private $aobpCalculationRepository;

    public function __construct(AobpCalculationRepository $aobpCalculationRepo)
    {
        $this->aobpCalculationRepository = $aobpCalculationRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the AobpCalculation.
     * GET|HEAD /aobpCalculations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aobpCalculations = $this->aobpCalculationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $aobpCalculationsCount = $this->aobpCalculationRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$aobpCalculationsCount,'total_pages'=>ceil($aobpCalculationsCount/$limit)],'items'=>$aobpCalculations->toArray()], 'Aobp Calculations retrieved successfully');
    }

    /**
     * Store a newly created AobpCalculation in storage.
     * POST /aobpCalculations
     *
     * @param CreateAobpCalculationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAobpCalculationAPIRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        $aobpCalculation = $this->aobpCalculationRepository->create($input);

        return $this->sendResponse($aobpCalculation->toArray(), 'Aobp Calculation saved successfully');
    }

    /**
     * Display the specified AobpCalculation.
     * GET|HEAD /aobpCalculations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AobpCalculation $aobpCalculation */
        $aobpCalculation = $this->aobpCalculationRepository->find($id);

        if (empty($aobpCalculation)) {
            return $this->sendError('Aobp Calculation not found');
        }

        return $this->sendResponse($aobpCalculation->toArray(), 'Aobp Calculation retrieved successfully');
    }

    /**
     * Update the specified AobpCalculation in storage.
     * PUT/PATCH /aobpCalculations/{id}
     *
     * @param int $id
     * @param UpdateAobpCalculationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAobpCalculationAPIRequest $request)
    {
        $input = $request->all();

        /** @var AobpCalculation $aobpCalculation */
        $aobpCalculation = $this->aobpCalculationRepository->find($id);

        if (empty($aobpCalculation)) {
            return $this->sendError('Aobp Calculation not found');
        }

        $aobpCalculation = $this->aobpCalculationRepository->update($input, $id);

        return $this->sendResponse($aobpCalculation->toArray(), 'AobpCalculation updated successfully');
    }

    /**
     * Remove the specified AobpCalculation from storage.
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
        /** @var AobpCalculation $aobpCalculation */
        $aobpCalculation = $this->aobpCalculationRepository->find($id);

        if (empty($aobpCalculation)) {
            return $this->sendError('Aobp Calculation not found');
        }

        $aobpCalculation->delete();

        return $this->sendSuccess('Aobp Calculation deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $aobpCalculationsCount = $this->aobpCalculationRepository->count();
        return $this->sendResponse(['count'=>$aobpCalculationsCount,'total_pages'=>ceil($aobpCalculationsCount/$limit)], 'Aobp Calculations Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->aobpCalculationRepository->multiDelete($ids)], 'Selected Aobp Calculations Deleted');
    }
    public function export()
    {
        return $this->aobpCalculationRepository->export()->download("Aobp Calculations-".date("Y-m-d").".xlsx");
    }
}
