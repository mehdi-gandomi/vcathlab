<?php

namespace Modules\AccessLevel\Http\Controllers\API;

use Modules\AccessLevel\Http\Requests\API\CreateUserActivityAPIRequest;
use Modules\AccessLevel\Http\Requests\API\UpdateUserActivityAPIRequest;
use Modules\AccessLevel\Models\UserActivity;
use Modules\AccessLevel\Repositories\UserActivityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserActivityController
 * @package Modules\AccessLevel\Http\Controllers\API
 */

class UserActivityAPIController extends AppBaseController
{
    /** @var  UserActivityRepository */
    private $userActivityRepository;

    public function __construct(UserActivityRepository $userActivityRepo)
    {
        $this->userActivityRepository = $userActivityRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the UserActivity.
     * GET|HEAD /userActivities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userActivities = $this->userActivityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $userActivitiesCount = $this->userActivityRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$userActivitiesCount,'total_pages'=>intval($userActivitiesCount/$limit)],'items'=>$userActivities->toArray()], 'User Activities retrieved successfully');
    }

    /**
     * Store a newly created UserActivity in storage.
     * POST /userActivities
     *
     * @param CreateUserActivityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserActivityAPIRequest $request)
    {
        $input = $request->all();

        $userActivity = $this->userActivityRepository->create($input);

        return $this->sendResponse($userActivity->toArray(), 'User Activity saved successfully');
    }

    /**
     * Display the specified UserActivity.
     * GET|HEAD /userActivities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserActivity $userActivity */
        $userActivity = $this->userActivityRepository->find($id);

        if (empty($userActivity)) {
            return $this->sendError('User Activity not found');
        }

        return $this->sendResponse($userActivity->toArray(), 'User Activity retrieved successfully');
    }

    /**
     * Update the specified UserActivity in storage.
     * PUT/PATCH /userActivities/{id}
     *
     * @param int $id
     * @param UpdateUserActivityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserActivityAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserActivity $userActivity */
        $userActivity = $this->userActivityRepository->find($id);

        if (empty($userActivity)) {
            return $this->sendError('User Activity not found');
        }

        $userActivity = $this->userActivityRepository->update($input, $id);

        return $this->sendResponse($userActivity->toArray(), 'UserActivity updated successfully');
    }

    /**
     * Remove the specified UserActivity from storage.
     * DELETE /userActivities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserActivity $userActivity */
        $userActivity = $this->userActivityRepository->find($id);

        if (empty($userActivity)) {
            return $this->sendError('User Activity not found');
        }

        $userActivity->delete();

        return $this->sendSuccess('User Activity deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $userActivitiesCount = $this->userActivityRepository->count();
        return $this->sendResponse(['count'=>$userActivitiesCount,'total_pages'=>intval($userActivitiesCount/$limit)], 'User Activities Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->userActivityRepository->multiDelete($ids)], 'Selected User Activities Deleted');
    }
    public function export()
    {
        return $this->userActivityRepository->export()->download("User Activities-".date("Y-m-d").".xlsx");
    }
}
