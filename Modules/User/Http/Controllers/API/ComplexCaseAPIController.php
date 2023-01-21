<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateComplexCaseAPIRequest;
use Modules\User\Http\Requests\API\UpdateComplexCaseAPIRequest;
use Modules\User\Models\ComplexCase;
use Modules\User\Repositories\ComplexCaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComplexCaseController
 * @package Modules\User\Http\Controllers\API
 */

class ComplexCaseAPIController extends AppBaseController
{
    /** @var  ComplexCaseRepository */
    private $complexCaseRepository;

    public function __construct(ComplexCaseRepository $complexCaseRepo)
    {
        $this->complexCaseRepository = $complexCaseRepo;
        $this->middleware('auth:sanctum')->except("comment");
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
        $complexCases = $this->complexCaseRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        if(!auth()->user()->master){
            $complexCases=$complexCases->where("user_id",auth()->user()->id);
        }
        $complexCasesCount = $complexCases->count();
        $limit=$request->get('limit',10);
        $complexCases=$complexCases->get();
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
    public function comment(Request $request,$id)
    {
        $complexCase=ComplexCase::findOrFail($id);
        $complexCase->comment($request->get("message"),$request->get("name"),$request->get("email"));
        if($request->wantsJson() || $request->acceptsJson()){
            return response()->json([
                'ok'=>true,
                'message'=>__("Your comment saved successfully and will be shown after confirmation"),
                'data'=>$complexCase->load("comments")
            ]);
        }else{
            return redirect()->back()->with("success",__("Your comment saved successfully and will be shown after confirmation"));
        }
    }
}
