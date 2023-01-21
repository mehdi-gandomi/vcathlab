<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateNIFFRCaseAPIRequest;
use Modules\User\Http\Requests\API\UpdateNIFFRCaseAPIRequest;
use Modules\User\Models\NIFFRCase;
use Modules\User\Repositories\NIFFRCaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\User\Events\NIFFRCreated;
use Modules\User\Models\NIFFRCaseData;
use Modules\User\Models\Patient;
use Response;

/**
 * Class NIFFRCaseController
 * @package Modules\User\Http\Controllers\API
 */

class NIFFRCaseAPIController extends AppBaseController
{
    /** @var  NIFFRCaseRepository */
    private $nIFFRCaseRepository;

    public function __construct(NIFFRCaseRepository $nIFFRCaseRepo)
    {
        $this->nIFFRCaseRepository = $nIFFRCaseRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the NIFFRCase.
     * GET|HEAD /nIFFRCases
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nIFFRCases = $this->nIFFRCaseRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        if(!auth()->user()->master){
            $nIFFRCases=$nIFFRCases->where("user_id",auth()->user()->id);
            $nIFFRCasesCount = NIFFRCase::where("user_id",auth()->user()->id)->count();
        }else{
            $nIFFRCasesCount = NIFFRCase::count();
        }
        $nIFFRCases=$nIFFRCases->get();

        $limit=$request->get('limit',10);

        return $this->sendResponse(['pagination_data'=>['count'=>$nIFFRCasesCount,'total_pages'=>ceil($nIFFRCasesCount/$limit)],'items'=>$nIFFRCases->toArray()], 'N I F F R Cases retrieved successfully');
    }

    /**
     * Store a newly created NIFFRCase in storage.
     * POST /nIFFRCases
     *
     * @param CreateNIFFRCaseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNIFFRCaseAPIRequest $request)
    {
        // if(count($request->get("points")) < 30){
        //     return $this->sendError('Points are not completed',200);
        // }
        // $nIFFRCase=NIFFRCase::create([
        //
        // ]);
        $niffrs=[];
        if($request->get("niffr_case_id")){
            $niffr=NIFFRCase::find($request->get("niffr_case_id"));
        }else{
            $niffr=NIFFRCase::firstOrCreate([
                'patient_id'=> $request->get("patient_id"),
                'physician'=>$request->get("physician")
            ]);
        }

        // array_merge($point,[
        //
        // ])
        // $patient=Patient::firstOrCreate($request->only("name","hosptial","age","sex"));

        foreach(array_values($request->get("points")) as $point){
            unset($point['done']);
            $name=$point['name'];
            unset($point['name']);
            // $values $point['values'];
            $point=array_merge($point,$point['values']);
            $point['map']=$request->get("map");
            unset($point['values']);
            $point=$niffr->points()->firstOrCreate($point);
            $niffrs[$name]=$point;
            NIFFRCreated::dispatch($point);
        }
        // NIFFRCaseData::insert($points);
        // $nIFFRCase=$nIFFRCase->load("data");
        return $this->sendResponse([
            'case'=>$niffr,
            'points'=>$niffrs
        ], 'NIFFR Case saved successfully');
    }

    /**
     * Display the specified NIFFRCase.
     * GET|HEAD /nIFFRCases/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NIFFRCase $nIFFRCase */
        $nIFFRCase = $this->nIFFRCaseRepository->find($id)->load("points");

        if (empty($nIFFRCase)) {
            return $this->sendError('N I F F R Case not found');
        }

        return $this->sendResponse($nIFFRCase->toArray(), 'N I F F R Case retrieved successfully');
    }

    /**
     * Update the specified NIFFRCase in storage.
     * PUT/PATCH /nIFFRCases/{id}
     *
     * @param int $id
     * @param UpdateNIFFRCaseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNIFFRCaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var NIFFRCase $nIFFRCase */
        $nIFFRCase = $this->nIFFRCaseRepository->find($id);

        if (empty($nIFFRCase)) {
            return $this->sendError('N I F F R Case not found');
        }

        $nIFFRCase = $this->nIFFRCaseRepository->update($input, $id);

        return $this->sendResponse($nIFFRCase->toArray(), 'NIFFRCase updated successfully');
    }

    /**
     * Remove the specified NIFFRCase from storage.
     * DELETE /nIFFRCases/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NIFFRCase $nIFFRCase */
        $nIFFRCase = $this->nIFFRCaseRepository->find($id);

        if (empty($nIFFRCase)) {
            return $this->sendError('N I F F R Case not found');
        }

        $nIFFRCase->delete();

        return $this->sendSuccess('N I F F R Case deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $nIFFRCasesCount = $this->nIFFRCaseRepository->count();
        return $this->sendResponse(['count'=>$nIFFRCasesCount,'total_pages'=>ceil($nIFFRCasesCount/$limit)], 'N I F F R Cases Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->nIFFRCaseRepository->multiDelete($ids)], 'Selected N I F F R Cases Deleted');
    }
    public function export()
    {
        return $this->nIFFRCaseRepository->export()->download("NIFFRCases-".date("Y-m-d").".xlsx");
    }
}
