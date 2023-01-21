<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateBodyCompositionAPIRequest;
use Modules\User\Http\Requests\API\UpdateBodyCompositionAPIRequest;
use Modules\User\Models\BodyComposition;
use Modules\User\Repositories\BodyCompositionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BodyCompositionController
 * @package Modules\User\Http\Controllers\API
 */

class BodyCompositionAPIController extends AppBaseController
{
    /** @var  BodyCompositionRepository */
    private $bodyCompositionRepository;

    public function __construct(BodyCompositionRepository $bodyCompositionRepo)
    {
        $this->bodyCompositionRepository = $bodyCompositionRepo;
        $this->middleware('auth:sanctum');
        
    }

    /**
     * Display a listing of the BodyComposition.
     * GET|HEAD /bodyCompositions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bodyCompositions = $this->bodyCompositionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $bodyCompositionsCount = $this->bodyCompositionRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$bodyCompositionsCount,'total_pages'=>ceil($bodyCompositionsCount/$limit)],'items'=>$bodyCompositions->toArray()], 'Body Compositions retrieved successfully');
    }

    /**
     * Store a newly created BodyComposition in storage.
     * POST /bodyCompositions
     *
     * @param CreateBodyCompositionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBodyCompositionAPIRequest $request)
    {
        $input = $request->all();

        $bodyComposition = $this->bodyCompositionRepository->create($input);

        return $this->sendResponse($bodyComposition->toArray(), 'Body Composition saved successfully');
    }

    /**
     * Display the specified BodyComposition.
     * GET|HEAD /bodyCompositions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BodyComposition $bodyComposition */
        $bodyComposition = $this->bodyCompositionRepository->find($id);

        if (empty($bodyComposition)) {
            return $this->sendError('Body Composition not found');
        }

        return $this->sendResponse($bodyComposition->toArray(), 'Body Composition retrieved successfully');
    }

    /**
     * Update the specified BodyComposition in storage.
     * PUT/PATCH /bodyCompositions/{id}
     *
     * @param int $id
     * @param UpdateBodyCompositionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBodyCompositionAPIRequest $request)
    {
        $input = $request->all();

        /** @var BodyComposition $bodyComposition */
        $bodyComposition = $this->bodyCompositionRepository->find($id);

        if (empty($bodyComposition)) {
            return $this->sendError('Body Composition not found');
        }

        $bodyComposition = $this->bodyCompositionRepository->update($input, $id);

        return $this->sendResponse($bodyComposition->toArray(), 'BodyComposition updated successfully');
    }

    /**
     * Remove the specified BodyComposition from storage.
     * DELETE /bodyCompositions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BodyComposition $bodyComposition */
        $bodyComposition = $this->bodyCompositionRepository->find($id);

        if (empty($bodyComposition)) {
            return $this->sendError('Body Composition not found');
        }

        $bodyComposition->delete();

        return $this->sendSuccess('Body Composition deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $bodyCompositionsCount = $this->bodyCompositionRepository->count();
        return $this->sendResponse(['count'=>$bodyCompositionsCount,'total_pages'=>ceil($bodyCompositionsCount/$limit)], 'Body Compositions Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->bodyCompositionRepository->multiDelete($ids)], 'Selected Body Compositions Deleted');
    }
    public function export()
    {
        return $this->bodyCompositionRepository->export()->download("Body Compositions-".date("Y-m-d").".xlsx");
    }
}
