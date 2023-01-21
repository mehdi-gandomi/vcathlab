<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreatePlanAPIRequest;
use Modules\User\Http\Requests\API\UpdatePlanAPIRequest;
use Modules\User\Models\Plan;
use Modules\User\Repositories\PlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlanController
 * @package Modules\User\Http\Controllers\API
 */

class PlanAPIController extends AppBaseController
{
    /** @var  PlanRepository */
    private $planRepository;

    public function __construct(PlanRepository $planRepo)
    {
        $this->planRepository = $planRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the Plan.
     * GET|HEAD /plans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $plans = $this->planRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $plansCount = $this->planRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$plansCount,'total_pages'=>ceil($plansCount/$limit)],'items'=>$plans->toArray()], 'Plans retrieved successfully');
    }

    /**
     * Store a newly created Plan in storage.
     * POST /plans
     *
     * @param CreatePlanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePlanAPIRequest $request)
    {
        $input = $request->all();

        $plan = $this->planRepository->create($input);

        return $this->sendResponse($plan->toArray(), 'Plan saved successfully');
    }

    /**
     * Display the specified Plan.
     * GET|HEAD /plans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Plan $plan */
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            return $this->sendError('Plan not found');
        }

        return $this->sendResponse($plan->toArray(), 'Plan retrieved successfully');
    }

    /**
     * Update the specified Plan in storage.
     * PUT/PATCH /plans/{id}
     *
     * @param int $id
     * @param UpdatePlanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Plan $plan */
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            return $this->sendError('Plan not found');
        }

        $plan = $this->planRepository->update($input, $id);

        return $this->sendResponse($plan->toArray(), 'Plan updated successfully');
    }

    /**
     * Remove the specified Plan from storage.
     * DELETE /plans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Plan $plan */
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            return $this->sendError('Plan not found');
        }

        $plan->delete();

        return $this->sendSuccess('Plan deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $plansCount = $this->planRepository->count();
        return $this->sendResponse(['count'=>$plansCount,'total_pages'=>ceil($plansCount/$limit)], 'Plans Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->planRepository->multiDelete($ids)], 'Selected Plans Deleted');
    }
    public function export()
    {
        return $this->planRepository->export()->download("Plans-".date("Y-m-d").".xlsx");
    }
}
