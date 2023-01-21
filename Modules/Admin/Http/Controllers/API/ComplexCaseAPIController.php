<?php

namespace Modules\Admin\Http\Controllers\API;

use Modules\Admin\Http\Requests\API\CreateComplexCaseAPIRequest;
use Modules\Admin\Http\Requests\API\UpdateComplexCaseAPIRequest;
use Modules\Admin\Models\ComplexCase;
use Modules\Admin\Repositories\ComplexCaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComplexCaseController
 * @package Modules\Admin\Http\Controllers\API
 */

class ComplexCaseAPIController extends AppBaseController
{
    /** @var  ComplexCaseRepository */
    private $complexCaseRepository;

    public function __construct(ComplexCaseRepository $complexCaseRepo)
    {
        $this->complexCaseRepository = $complexCaseRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the ComplexCase.
     * GET|HEAD /complexCases
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $complexCases = $this->complexCaseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $complexCasesCount = $this->complexCaseRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$complexCasesCount,'total_pages'=>ceil($complexCasesCount/$limit)],'items'=>$complexCases->toArray()], 'Complex Cases retrieved successfully');
    }

    /**
     * Store a newly created ComplexCase in storage.
     * POST /complexCases
     *
     * @param CreateComplexCaseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComplexCaseAPIRequest $request)
    {
        $input = $request->all();

        $complexCase = $this->complexCaseRepository->create($input);

        return $this->sendResponse($complexCase->toArray(), 'Complex Case saved successfully');
    }

    /**
     * Display the specified ComplexCase.
     * GET|HEAD /complexCases/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ComplexCase $complexCase */
        $complexCase = $this->complexCaseRepository->find($id);

        if (empty($complexCase)) {
            return $this->sendError('Complex Case not found');
        }

        return $this->sendResponse($complexCase->toArray(), 'Complex Case retrieved successfully');
    }

    /**
     * Update the specified ComplexCase in storage.
     * PUT/PATCH /complexCases/{id}
     *
     * @param int $id
     * @param UpdateComplexCaseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplexCaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var ComplexCase $complexCase */
        $complexCase = $this->complexCaseRepository->find($id);

        if (empty($complexCase)) {
            return $this->sendError('Complex Case not found');
        }

        $complexCase = $this->complexCaseRepository->update($input, $id);

        return $this->sendResponse($complexCase->toArray(), 'ComplexCase updated successfully');
    }

    /**
     * Remove the specified ComplexCase from storage.
     * DELETE /complexCases/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ComplexCase $complexCase */
        $complexCase = $this->complexCaseRepository->find($id);

        if (empty($complexCase)) {
            return $this->sendError('Complex Case not found');
        }

        $complexCase->delete();

        return $this->sendSuccess('Complex Case deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $complexCasesCount = $this->complexCaseRepository->count();
        return $this->sendResponse(['count'=>$complexCasesCount,'total_pages'=>ceil($complexCasesCount/$limit)], 'Complex Cases Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->complexCaseRepository->multiDelete($ids)], 'Selected Complex Cases Deleted');
    }
    public function export()
    {
        return $this->complexCaseRepository->export()->download("Complex Cases-".date("Y-m-d").".xlsx");
    }

}
