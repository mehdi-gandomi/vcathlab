<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateEchoAPIRequest;
use Modules\User\Http\Requests\API\UpdateEchoAPIRequest;
use Modules\User\Repositories\EchoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EchoController
 * @package Modules\User\Http\Controllers\API
 */

class EchoAPIController extends AppBaseController
{
    /** @var  EchoRepository */
    private $echoRepository;

    public function __construct(EchoRepository $echoRepo)
    {
        $this->echoRepository = $echoRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the Echo.
     * GET|HEAD /echoes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $echoes = $this->echoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $echoesCount = $this->echoRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$echoesCount,'total_pages'=>ceil($echoesCount/$limit)],'items'=>$echoes->toArray()], 'Echoes retrieved successfully');
    }

    /**
     * Store a newly created Echo in storage.
     * POST /echoes
     *
     * @param CreateEchoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEchoAPIRequest $request)
    {
        $input = $request->all();

        $echo = $this->echoRepository->create($input);

        return $this->sendResponse($echo->toArray(), 'Echo saved successfully');
    }

    /**
     * Display the specified Echo.
     * GET|HEAD /echoes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Echo $echo */
        $echo = $this->echoRepository->find($id);

        if (empty($echo)) {
            return $this->sendError('Echo not found');
        }

        return $this->sendResponse($echo->toArray(), 'Echo retrieved successfully');
    }

    /**
     * Update the specified Echo in storage.
     * PUT/PATCH /echoes/{id}
     *
     * @param int $id
     * @param UpdateEchoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEchoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Echo $echo */
        $echo = $this->echoRepository->find($id);

        if (empty($echo)) {
            return $this->sendError('Echo not found');
        }

        $echo = $this->echoRepository->update($input, $id);

        return $this->sendResponse($echo->toArray(), 'Echo updated successfully');
    }

    /**
     * Remove the specified Echo from storage.
     * DELETE /echoes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Echo $echo */
        $echo = $this->echoRepository->find($id);

        if (empty($echo)) {
            return $this->sendError('Echo not found');
        }

        $echo->delete();

        return $this->sendSuccess('Echo deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $echoesCount = $this->echoRepository->count();
        return $this->sendResponse(['count'=>$echoesCount,'total_pages'=>ceil($echoesCount/$limit)], 'Echoes Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->echoRepository->multiDelete($ids)], 'Selected Echoes Deleted');
    }
    public function export()
    {
        return $this->echoRepository->export()->download("Echoes-".date("Y-m-d").".xlsx");
    }
}
