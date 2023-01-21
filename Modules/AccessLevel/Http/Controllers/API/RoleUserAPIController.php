<?php

namespace Modules\AccessLevel\Http\Controllers\API;

use Modules\Panel\Http\Requests\API\CreateUserAPIRequest;
use Modules\Panel\Http\Requests\API\UpdateUserAPIRequest;
use Modules\Panel\Models\User;
use Modules\Panel\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\User as ModelsUser;
use App\Models\User as BaseUser;	/* Modules\AccessLevel\Models\Base\User */
use Modules\AccessLevel\Models\Role;
use Silber\Bouncer\Database\Models;
use Response;

/**
 * Class UserController
 * @package Modules\Panel\Http\Controllers\API
 */

class RoleUserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of Role Users.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
	$role_user_ids = Role::find($request->get('role_id'))->getUsers(true);
        $users = $this->userRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        )->whereIn('id', $role_user_ids);
        $limit=$request->get('limit',10);
        $usersCount = $users->count();
        $totalPages=intval($usersCount/$limit);
        $totalPages=$totalPages > 0 ? $totalPages:1;
        return $this->sendResponse(['pagination_data'=>['count'=>$usersCount,'total_pages'=>$totalPages],'items'=>$users->toArray()], 'Users retrieved successfully');
    }

/**
     * Display a listing of outside Role Users.
     * GET /show_not_assigned?role_id
     *
     * @param Request $request
     * @return Response
     */
    public function show_not_assigned(Request $request)
    {
	$role_user_ids = Role::find($request->get('role_id'))->getUsers(true);
        $users = $this->userRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        )->whereNotIn('id', $role_user_ids);
        $limit=$request->get('limit',10);
        $usersCount = $users->count();
        $items = $users->map(function($user) {
	        return ['id' => $user->id, 'title' => $user->personnel->first_name . ' ' . $user->personnel->last_name];
        });
        return $this->sendResponse(['pagination_data'=>['count'=>$usersCount,'total_pages'=>intval($usersCount/$limit)],'items'=> $items], 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user = $this->userRepository->update($input, $id);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $role_id = array_reverse(explode('/', parse_url($request->headers->get("referer"),  PHP_URL_PATH)))[1]; // extract role from prev url
        BaseUser::find($id)->retract(Role::find($role_id)->name);

        return $this->sendSuccess('User deleted from role');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $usersCount = $this->userRepository->count();
        return $this->sendResponse(['count'=>$usersCount,'total_pages'=>intval($usersCount/$limit)], 'Users Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        $role_name = Role::find($request->get('role_id'))->name;
        foreach($ids as $user_id)
        		BaseUser::find($user_id)->retract($role_name);

        return $this->sendResponse(['count'=>count($ids)], 'Selected Users deleted from role');
    }
    public function export()
    {
        return $this->userRepository->export()->download("Users-".date("Y-m-d").".xlsx");
    }
}
