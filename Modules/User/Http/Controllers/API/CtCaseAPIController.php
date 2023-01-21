<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateCtCaseAPIRequest;
use Modules\User\Http\Requests\API\UpdateCtCaseAPIRequest;
use Modules\User\Models\CtCase;
use Modules\User\Repositories\CtCaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\User\Models\Patient;
use Modules\UserVerification\Entities\UserVerification;
use Modules\UserVerification\Jobs\SendVerificationCode;
use Response;

/**
 * Class CtCaseController
 * @package Modules\User\Http\Controllers\API
 */

class CtCaseAPIController extends AppBaseController
{
    /** @var  CtCaseRepository */
    private $ctCaseRepository;

    public function __construct(CtCaseRepository $ctCaseRepo)
    {
        $this->ctCaseRepository = $ctCaseRepo;
        // $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the CtCase.
     * GET|HEAD /ctCases
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ctCases = $this->ctCaseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $ctCasesCount = $this->ctCaseRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$ctCasesCount,'total_pages'=>ceil($ctCasesCount/$limit)],'items'=>$ctCases->toArray()], 'Ct Cases retrieved successfully');
    }

    /**
     * Store a newly created CtCase in storage.
     * POST /ctCases
     *
     * @param CreateCtCaseAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $ctCase = $this->ctCaseRepository->create($input);

        return $this->sendResponse($ctCase->toArray(), 'Ct Case saved successfully');
    }

    /**
     * Display the specified CtCase.
     * GET|HEAD /ctCases/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CtCase $ctCase */
        $ctCase = $this->ctCaseRepository->find($id);

        if (empty($ctCase)) {
            return $this->sendError('Ct Case not found');
        }

        return $this->sendResponse($ctCase->toArray(), 'Ct Case retrieved successfully');
    }

    /**
     * Update the specified CtCase in storage.
     * PUT/PATCH /ctCases/{id}
     *
     * @param int $id
     * @param UpdateCtCaseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCtCaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var CtCase $ctCase */
        $ctCase = $this->ctCaseRepository->find($id);

        if (empty($ctCase)) {
            return $this->sendError('Ct Case not found');
        }

        $ctCase = $this->ctCaseRepository->update($input, $id);

        return $this->sendResponse($ctCase->toArray(), 'CtCase updated successfully');
    }

    /**
     * Remove the specified CtCase from storage.
     * DELETE /ctCases/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CtCase $ctCase */
        $ctCase = $this->ctCaseRepository->find($id);

        if (empty($ctCase)) {
            return $this->sendError('Ct Case not found');
        }

        $ctCase->delete();

        return $this->sendSuccess('Ct Case deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $ctCasesCount = $this->ctCaseRepository->count();
        return $this->sendResponse(['count'=>$ctCasesCount,'total_pages'=>ceil($ctCasesCount/$limit)], 'Ct Cases Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->ctCaseRepository->multiDelete($ids)], 'Selected Ct Cases Deleted');
    }
    public function export()
    {
        return $this->ctCaseRepository->export()->download("Ct Cases-".date("Y-m-d").".xlsx");
    }
    public function register(Request $request)
    {
        $data=$request->validate([
            "name"=> "required",
            "age"=> "required",
            "sex"=> 'required',
            "phone"=>"required"
        ]);
        $patient=Patient::create($data);
        $code=random_int(11111,99999);
        $userverification=UserVerification::create([
            'ip'=>$request->ip(),
            'user_agent'=>$request->header('user-agent'),
            'mobile'=>$data['phone'],
            'code'=>$code
        ]);
        SendVerificationCode::dispatch($code,"mobile","verification")->onQueue("mobile");
        return [
            'ok'=>true,
            'data'=>[
                'patient'=>$patient,
                'userverification'=>$userverification
            ]
        ];
    }
}
