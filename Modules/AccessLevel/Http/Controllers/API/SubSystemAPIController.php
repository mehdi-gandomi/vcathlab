<?php

namespace Modules\AccessLevel\Http\Controllers\API;

use Modules\AccessLevel\Http\Requests\API\CreateSubSystemAPIRequest;
use Modules\AccessLevel\Http\Requests\API\UpdateSubSystemAPIRequest;
use Modules\AccessLevel\Models\SubSystem;
use Modules\AccessLevel\Repositories\SubSystemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubSystemController
 * @package Modules\AccessLevel\Http\Controllers\API
 */

class SubSystemAPIController extends AppBaseController
{
    /** @var  SubSystemRepository */
    private $subSystemRepository;

    public function __construct(SubSystemRepository $subSystemRepo)
    {
        $this->subSystemRepository = $subSystemRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the SubSystem.
     * GET|HEAD /subSystems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subSystems = $this->subSystemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $subSystemsCount = $this->subSystemRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$subSystemsCount,'total_pages'=>intval($subSystemsCount/$limit)],'items'=>$subSystems->toArray()], 'Sub Systems retrieved successfully');
    }

    /**
     * Store a newly created SubSystem in storage.
     * POST /subSystems
     *
     * @param CreateSubSystemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubSystemAPIRequest $request)
    {
        $input = $request->all();

        $subSystem = $this->subSystemRepository->create($input);

        return $this->sendResponse($subSystem->toArray(), 'Sub System saved successfully');
    }

    /**
     * Display the specified SubSystem.
     * GET|HEAD /subSystems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubSystem $subSystem */
        $subSystem = $this->subSystemRepository->find($id);

        if (empty($subSystem)) {
            return $this->sendError('Sub System not found');
        }

        return $this->sendResponse($subSystem->toArray(), 'Sub System retrieved successfully');
    }

    /**
     * Update the specified SubSystem in storage.
     * PUT/PATCH /subSystems/{id}
     *
     * @param int $id
     * @param UpdateSubSystemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubSystemAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubSystem $subSystem */
        $subSystem = $this->subSystemRepository->find($id);

        if (empty($subSystem)) {
            return $this->sendError('Sub System not found');
        }

        $subSystem = $this->subSystemRepository->update($input, $id);

        return $this->sendResponse($subSystem->toArray(), 'SubSystem updated successfully');
    }

    /**
     * Remove the specified SubSystem from storage.
     * DELETE /subSystems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubSystem $subSystem */
        $subSystem = $this->subSystemRepository->find($id);

        if (empty($subSystem)) {
            return $this->sendError('Sub System not found');
        }

        $subSystem->delete();

        return $this->sendSuccess('Sub System deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $subSystemsCount = $this->subSystemRepository->count();
        return $this->sendResponse(['count'=>$subSystemsCount,'total_pages'=>intval($subSystemsCount/$limit)], 'Sub Systems Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->subSystemRepository->multiDelete($ids)], 'Selected Sub Systems Deleted');
    }
    public function export()
    {
        return $this->subSystemRepository->export()->download("Sub Systems-".date("Y-m-d").".xlsx");
    }
}
