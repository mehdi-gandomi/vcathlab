<?php

namespace Modules\Admin\Http\Controllers\API;

use Modules\Admin\Http\Requests\API\CreatePhysicianAPIRequest;
use Modules\Admin\Http\Requests\API\UpdatePhysicianAPIRequest;
use Modules\Admin\Models\Physician;
use Modules\Admin\Repositories\PhysicianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PhysicianController
 * @package Modules\Admin\Http\Controllers\API
 */

class PhysicianAPIController extends AppBaseController
{
    /** @var  PhysicianRepository */
    private $physicianRepository;

    public function __construct(PhysicianRepository $physicianRepo)
    {
        $this->physicianRepository = $physicianRepo;
        $this->middleware('auth:sanctum');
        
    }

    /**
     * Display a listing of the Physician.
     * GET|HEAD /physicians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $physicians = $this->physicianRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $physiciansCount = $this->physicianRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$physiciansCount,'total_pages'=>ceil($physiciansCount/$limit)],'items'=>$physicians->toArray()], 'Physicians retrieved successfully');
    }

    /**
     * Store a newly created Physician in storage.
     * POST /physicians
     *
     * @param CreatePhysicianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePhysicianAPIRequest $request)
    {
        $input = $request->all();

        $physician = $this->physicianRepository->create($input);

        return $this->sendResponse($physician->toArray(), 'Physician saved successfully');
    }

    /**
     * Display the specified Physician.
     * GET|HEAD /physicians/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Physician $physician */
        $physician = $this->physicianRepository->find($id);

        if (empty($physician)) {
            return $this->sendError('Physician not found');
        }

        return $this->sendResponse($physician->toArray(), 'Physician retrieved successfully');
    }

    /**
     * Update the specified Physician in storage.
     * PUT/PATCH /physicians/{id}
     *
     * @param int $id
     * @param UpdatePhysicianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhysicianAPIRequest $request)
    {
        $input = $request->all();

        /** @var Physician $physician */
        $physician = $this->physicianRepository->find($id);

        if (empty($physician)) {
            return $this->sendError('Physician not found');
        }

        $physician = $this->physicianRepository->update($input, $id);

        return $this->sendResponse($physician->toArray(), 'Physician updated successfully');
    }

    /**
     * Remove the specified Physician from storage.
     * DELETE /physicians/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Physician $physician */
        $physician = $this->physicianRepository->find($id);

        if (empty($physician)) {
            return $this->sendError('Physician not found');
        }

        $physician->delete();

        return $this->sendSuccess('Physician deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $physiciansCount = $this->physicianRepository->count();
        return $this->sendResponse(['count'=>$physiciansCount,'total_pages'=>ceil($physiciansCount/$limit)], 'Physicians Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->physicianRepository->multiDelete($ids)], 'Selected Physicians Deleted');
    }
    public function export()
    {
        return $this->physicianRepository->export()->download("Physicians-".date("Y-m-d").".xlsx");
    }
}
