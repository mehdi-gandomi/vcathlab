<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateComputationCenterAPIRequest;
use Modules\User\Http\Requests\API\UpdateComputationCenterAPIRequest;
use Modules\User\Models\ComputationCenter;
use Modules\User\Repositories\ComputationCenterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComputationCenterController
 * @package Modules\User\Http\Controllers\API
 */

class ComputationCenterAPIController extends AppBaseController
{
    /** @var  ComputationCenterRepository */
    private $computationCenterRepository;

    public function __construct(ComputationCenterRepository $computationCenterRepo)
    {
        $this->computationCenterRepository = $computationCenterRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the ComputationCenter.
     * GET|HEAD /computationCenters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $computationCenters = $this->computationCenterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $computationCentersCount = $this->computationCenterRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$computationCentersCount,'total_pages'=>ceil($computationCentersCount/$limit)],'items'=>$computationCenters->toArray()], 'Computation Centers retrieved successfully');
    }

    /**
     * Store a newly created ComputationCenter in storage.
     * POST /computationCenters
     *
     * @param CreateComputationCenterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComputationCenterAPIRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        $computationCenter = $this->computationCenterRepository->create($input);
        $link=url("/computation-center/payment/".sha1($computationCenter->id));
 $sendsms="http://ippanel.com:8080/?apikey=gHsfMyLljTpjDLaxWf0J-l2u3ELBBFMh9yd_6NzA4KA=&pid=07hunzvxhuvohky&fnum=3000505&tnum=".$computationCenter->patient->phone."&p1=link&v1=".$link;
        $response=file_get_contents($sendsms);
        return $this->sendResponse($computationCenter->toArray(), 'Computation Center saved successfully');
    }

    /**
     * Display the specified ComputationCenter.
     * GET|HEAD /computationCenters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ComputationCenter $computationCenter */
        $computationCenter = $this->computationCenterRepository->find($id);

        if (empty($computationCenter)) {
            return $this->sendError('Computation Center not found');
        }

        return $this->sendResponse($computationCenter->toArray(), 'Computation Center retrieved successfully');
    }

    /**
     * Update the specified ComputationCenter in storage.
     * PUT/PATCH /computationCenters/{id}
     *
     * @param int $id
     * @param UpdateComputationCenterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComputationCenterAPIRequest $request)
    {
        $input = $request->all();

        /** @var ComputationCenter $computationCenter */
        $computationCenter = $this->computationCenterRepository->find($id);

        if (empty($computationCenter)) {
            return $this->sendError('Computation Center not found');
        }

        $computationCenter = $this->computationCenterRepository->update($input, $id);

        return $this->sendResponse($computationCenter->toArray(), 'ComputationCenter updated successfully');
    }

    /**
     * Remove the specified ComputationCenter from storage.
     * DELETE /computationCenters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ComputationCenter $computationCenter */
        $computationCenter = $this->computationCenterRepository->find($id);

        if (empty($computationCenter)) {
            return $this->sendError('Computation Center not found');
        }

        $computationCenter->delete();

        return $this->sendSuccess('Computation Center deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $computationCentersCount = $this->computationCenterRepository->count();
        return $this->sendResponse(['count'=>$computationCentersCount,'total_pages'=>ceil($computationCentersCount/$limit)], 'Computation Centers Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->computationCenterRepository->multiDelete($ids)], 'Selected Computation Centers Deleted');
    }
    public function export()
    {
        return $this->computationCenterRepository->export()->download("Computation Centers-".date("Y-m-d").".xlsx");
    }
}
